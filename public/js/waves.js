var columns = [];
var Dampening = 0.025;
var Tension = 0.025;
var Spread = 0.25;
var WaveHeightStart = 500;
var drawCanvas;
var drawCanvas2;
var self=this;
var backgroundImg;

// shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame    ||
        function( callback ){
            window.setTimeout(callback, 10000 / 60);
        };
})();

window.addEventListener('load', function () {
    init();
});

window.addEventListener('resize', function () {
    init();
});

function init() {
    this.backgroundImg = new Image();
    this.backgroundImg.src = 'img/bg.png';

    for (var i=0;i<80;i++) {
        columns[i] = new column();
        columns[i].Height = this.WaveHeightStart;
        columns[i].TargetHeight = this.WaveHeightStart;
        columns[i].Speed = 0;
    }
    this.drawCanvas = document.getElementById("myCanvas");
    this.drawCanvas.width  = window.innerWidth+100;
    this.drawCanvas.height = window.innerHeight;

    this.drawCanvas2 = document.getElementById("myCanvas2");
    this.drawCanvas2.width  = window.innerWidth+100;
    this.drawCanvas2.height = window.innerHeight;

    var clickEventType=((document.ontouchstart!==null)?'click':'touchstart');
    this.drawCanvas.addEventListener(clickEventType, doSplash, false);
    document.getElementById('infographic').addEventListener('mouseover', doSplash, false);

    this.splash(1, 200);
}

function doSplash(event) {
    event.preventDefault();
    var x;
    var y;
    var inputEvent;
    if (event.touches) {
        inputEvent = event.touches[0];
    } else {
        inputEvent = event;
    }
    var x = inputEvent.pageX;
    var y = inputEvent.pageY;
    var pc = x/self.drawCanvas.width;
    var newX = pc*columns.length;
    splash(newX|10, 200);
}


// usage:
// instead of setInterval(render, 16) ....

(function animloop(){
    requestAnimFrame(animloop);
    doWave();
})();



function doWave(e) {

    var i;
    for (i = 0; i < this.columns.length; i++) {
        this.columns[i].Update(this.Dampening, this.Tension);
    }

    var leftDeltas = new Array(this.columns.length);
    var rightDeltas = new Array(this.columns.length);

    for (var j = 0; j < 8; j++) {
        for (i = 0; i < this.columns.length; i++) {
            if (i > 0) {
                leftDeltas[i] = Spread * (this.columns[i].Height - this.columns[i - 1].Height);
                this.columns[i - 1].Speed += leftDeltas[i];
            }
            if (i < this.columns.length - 1) {
                rightDeltas[i] = Spread * (this.columns[i].Height - this.columns[i + 1].Height);
                this.columns[i + 1].Speed += rightDeltas[i];
            }
        }

        for (i = 0; i < this.columns.length; i++) {
            if (i > 0) {
                this.columns[i - 1].Height += leftDeltas[i];
            }
            if (i < this.columns.Length - 1) {
                this.columns[i + 1].Height += rightDeltas[i];
            }
        }
    }
    this.draw(this.drawCanvas, 0);
    this.draw(this.drawCanvas2, 20);

}

function draw(ctx, offset) {
    if (ctx) {
        var context = ctx.getContext('2d');
        context.clearRect(0, 0, ctx.width, ctx.height);

        context.lineWidth = 4;

        var lingrad = context.createLinearGradient(0,0,0,ctx.height);
        lingrad.addColorStop(0, '#c4151c');
        lingrad.addColorStop(1, '#9d0b0f');

        context.fillStyle = lingrad;
        context.strokeStyle = '#979f9f';

        context.beginPath();
        context.moveTo(0, this.columns[0].Height+offset);
        for (var i = 0; i < this.columns.length; i++) {
            context.lineTo(i*(ctx.width/80), this.columns[i].Height+offset);
        }
        context.lineTo(ctx.width, ctx.height);
        context.lineTo(0, ctx.height);
        context.lineTo(0, this.columns[this.columns.length-1].Height+offset);
        context.stroke();
        context.fill();
    }

}

function splash(index, speed) {
    if (index >= 0 && index < this.columns.length) {
        this.columns[index].Speed = speed;
    }
}

function column() {
    this.TargetHeight;
    this.Height;
    this.Speed;
    this.Update = function(dampening, tension) {
        var x = this.TargetHeight - this.Height;
        this.Speed += tension * x - this.Speed * dampening;
        this.Height += this.Speed;
    }
}


