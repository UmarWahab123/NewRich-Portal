<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}}
            <a class="ml-25" href="https://newrich.com" target="_blank">Newrich</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@if(Session::has('message'))
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
<script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="../../../app-assets/js/scripts/extensions/ext-component-toastr.js"></script>
@endif
<script>
    $('.setmode').click(function () {
                            $.ajax({
                            type:'get',
                            dataType:'json',
                            url: '{{url('layoutmode')}}',
                            success: function(response){
                                var layoutmode=response.layoutmode;
                                window.location.reload();
                                return false;
                                if(layoutmode=="light-layout"){
                                    $('body').removeClass('dark-layout');
                                    $('body').addClass('light-layout');
                                }
                                else{
                                     $('body').addClass('dark-layout');
                                     $('body').removeClass('light-layout');
                                }
                            }
                        });
                    });

    $('.logout').click(function () {
        $('#frm-logout').submit();
    });
    <?php  if(Session::has('message')):  ?>
<?php $message = Session::get('message');
           $msg= $message['text'];
            ?>
    <?php  if($message['title'] == 'Success'): ?>
toastr['success']('👋 {{$msg}}', 'Success!', {
closeButton: true,
tapToDismiss: true,
progressBar: true,

    });
<?php else: ?>
        toastr['error']('👋 {{$msg}}', 'Success!', {
    closeButton: true,
    tapToDismiss: true,
    progressBar: true,
});
<?php
endif;
Session::forget('message');
endif;
?>
</script>