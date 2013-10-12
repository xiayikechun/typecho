<?php if(!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<script src="<?php $options->adminUrl('javascript/jquery.js?v=' . $suffixVersion); ?>"></script> 
<script src="<?php $options->adminUrl('javascript/jquery-ui.js?v=' . $suffixVersion); ?>"></script> 
<script src="<?php $options->adminUrl('javascript/typecho.js?v=' . $suffixVersion); ?>"></script>
<script>
    (function () {
        $(document).ready(function() {
            <?php if ($notice->highlight): ?>                
            //增加高亮效果
            $('#<?php echo $notice->highlight; ?>').effect('highlight', '#AACB36', 1000);
            <?php endif; ?>

            //增加淡出效果
            (function () {
                var p = $('.popup');

                if (p.length > 0) {
                    if (p.hasClass('notice')) {
                        p.effect('bounce');
                    } else if (p.hasClass('error')) {
                        p.effect('shake');
                    } else {
                        p.slideDown();
                    }
                    
                    p.delay(5000).fadeOut();
                }
            })();

            $('a').each(function () {
                var t = $(this), href = t.attr('href');

                if (/^<?php echo preg_quote($options->adminUrl, '/'); ?>.*$/.exec(href) 
                        || /^<?php echo substr(preg_quote(Typecho_Common::url('s', $options->index), '/'), 0, -1); ?>action\/[_a-zA-Z0-9\/]+.*$/.exec(href)) {
                    return;
                }

                t.attr('target', '_blank');
            });
            
            /*
            //打开链接
            (function () {
                
                _d.getElements('a').each(function (item) {
                    var _href = item.href;
                    
                    if (_href && 0 != _href.indexOf('#')) {
                        //确认框
                        item.addEvent('click', function (event) {
                            var _lang = this.get('lang');
                            var _c = _lang ? confirm(_lang) : true;
                
                            if (!_c) {
                                event.stop();
                            }
                        });
        
                        if (/^<?php echo preg_quote($options->adminUrl, '/'); ?>.*$/.exec(_href) 
                            || /^<?php echo substr(preg_quote(Typecho_Common::url('s', $options->index), '/'), 0, -1); ?>action\/[_a-zA-Z0-9\/]+.*$/.exec(_href)) {
                            return;
                        }
            
                        item.set('target', '_blank');
                    }
                });
            })();
            
            Typecho.Table.init('.typecho-list-table');
            Typecho.Table.init('.typecho-list-notable');
            */
        });
    })();
</script>