<div class="ui stackable grid">
    <div class="four column row">
        <div class="left floated column">
            <div id="header_logo"></div>
        </div>
        <div class="right floated column">
            <div class="ui basic padded right aligned segment">
                    <span id="twitter">
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.thewarcosts.com/"
                   data-text="{{'#WarCosts today: ' . ($migrated->today ?? 0)
                                . ' migrated, ' . ($killed->today ?? 0) . ' killed, ' . ($injured->today ?? 0)
                                . ' injured. ' . now()->format('d F Y') . ' #Ukraine #Russia'}}"
                   data-via="thewarcosts" data-size="large">Tweet</a>
                <script>
                    !function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + '://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'twitter-wjs');
                </script>
                </span>
            </div>
        </div>
    </div>
</div>