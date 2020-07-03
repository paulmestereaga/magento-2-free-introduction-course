define([
    'jquery',
    'jquery/ui',
    'Magento_Checkout/js/sidebar'
], function($){

    $.widget('custom.sidebar', $.mage.sidebar, {

        /**
         * Calculate height of minicart list
         *
         * @private
         */
        _calcHeight: function () {
            var self = this,
                height = 0,
                counter = this.options.minicart.maxItemsVisible,
                target = $(this.options.minicart.list),
                outerHeight;

            self.scrollHeight = 0;
            target.children().each(function () {

                if ($(this).find('.options').length > 0) {
                    $(this).collapsible();
                }
                outerHeight = $(this).outerHeight(true);

                if (counter-- > 0) {
                    height += outerHeight;
                }
                self.scrollHeight += outerHeight;
            });

            height += 900;

            target.parent().height(height);
        }



    });

return $.custom.sidebar;

});
