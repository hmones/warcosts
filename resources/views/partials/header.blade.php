<div class="ui stackable grid">
    <div class="four column row">
        <div class="left floated column">
            <div>
                <img src="{{asset('img/logo.png')}}" width="100px"  alt="the war cost"/>
            </div>
        </div>
        <div class="right floated column" style="padding-top: 0 !important; padding-bottom: 0 !important">
            <div class="ui basic right aligned segment" style="padding-bottom:0; padding-top: 0;">
                <span id="twitter">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.thewarcosts.com/"
                       data-text="{{'#WarCosts #Ukraine: ' . ($migrated->ukraine->total ?? 0)
                                    . ' migrated, ' . ($killed->ukraine->total ?? 0) . ' killed, ' . ($injured->ukraine->total ?? 0)
                                    . ' injured. ' . ' #Russia: ' . ($migrated->russia->total ?? 0)
                                    . ' migrated, ' . ($killed->russia->total ?? 0) . ' killed, ' . ($injured->russia->total ?? 0)
                                    . ' injured. '}}"
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