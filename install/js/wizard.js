$(document).ready(function() {
    $('#wizard').bootstrapWizard({'tabClass': 'nav nav-tabs',
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;

            if($current >= $total) {
                $('#wizard').find('.pager .next').hide();
                $('#wizard').find('.pager .finish').show();
                $('#wizard').find('.pager .finish').removeClass('disabled');
            } else {
                $('#wizard').find('.pager .next').show();
                $('#wizard').find('.pager .finish').hide();
            }
        }
    });
});