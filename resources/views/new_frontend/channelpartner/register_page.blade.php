@extends('new_frontend.layouts.app')

@section('content')
    @include('new_frontend.includes.header')
    <div class="layout">
        @include('new_frontend.includes.sidebar')
        <div class="content channel-partner">
            <div class="container">
                <div class="form_section">
                    <h2>Channel Partner Registration</h2>
                    <form method="post" class="register_form">
                        <div class="fileld">
                            <label>Name<span>*</span></label>
                            <input type="text" name="txtName" class="inp" required>
                        </div>

                        <div class="fileld">
                            <label>Name of Firm<span>*</span></label>
                            <input type="text" name="txtFirm" class="inp" required>
                        </div>


                        <div class="fileld">
                            <label>Office Adress<span>*</span></label>
                            <input type="text" name="txtOfficeAddress" class="inp" required>
                        </div>


                        <div class="fileld">
                            <label>Email id<span>*</span></label>
                            <input type="text" name="txtEmail" class="inp" required>
                        </div>


                        <div class="fileld">
                            <label>Phone Number<span>*</span></label>
                            <input type="text" name="txtPhone" class="inp" required>
                        </div>


                        <div class="fileld">
                            <label>Rera</label>
                            <input type="text" name="txtRera" class="inp">
                        </div>


                        <div class="fileld">
                            <label>City of operation<span>*</span></label>
                            <input type="text" name="txtCity" class="inp" required>
                        </div>
                        <div class="check">
                            <input id="terms" name="terms" value="1" class="" type="checkbox">
                        </div>

                        <div class="frm_cnt">

                            <p>By clicking Submit, you consent to your information being shared with Axis-E-Corp and its
                                group
                                companies, in accordance to our privacy policy. The information shall be maintained in full
                                confidentiality and shall not be shared with any third party. We may use this information to
                                get
                                in touch with you regarding your enquiry via Email, SMS, Whatsapp.</p></div>

                        <div class="clear"></div>


                        <div class="fileld">
                            <button type="submit" class="btn_submit submit_contact">SUBMIT</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="page_reference" value="channel_partner_register">

                    </form>
                </div>
            </div>
            @include('new_frontend.includes.footer')

            <script type="text/javascript">
                $(document).ready(function () {
                    $('.register_form').submit(function (e) {
                        e.preventDefault();

                        var terms = $('#terms').is(':checked');

                        if (terms == false) {
                            alert("Please click on terms and conditions checkbox");
                            return false;
                        }


                        $('.submit_contact').text('Sending...');
                        $.ajax({
                            // headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                            url: '/saveChannelPartner',
                            type: 'post',
                            data: $(this).serialize(),
                            success: function (response) {
                                //console.log(response);
                                if (response.status == 1) {
                                    alert(response.msg);
                                    $('input[name="txtName"]').val('');
                                    $("input[name='txtFirm']").val('');
                                    $("input[name='txtOfficeAddress']").val('');
                                    $("input[name='txtEmail']").val('');
                                    $("input[name='txtPhone']").val('');
                                    $('input[name="txtRera"]').val('');
                                    $('input[name="txtCity"]').val('');
                                } else if (response.status == 'error') {
                                    alert(response.message.txtPhone);
                                }else if (response.status == '2') {
                                    alert(response.message);
                                } else {
                                    alert(response.msg);
                                    //window.location.reload();
                                }

                                $('.submit_contact').text('SEND');
                                // $('.col-message, .success-message').show();
                            },
                            error: function () {
                                $('.col-message, .error-message').show();
                            }
                        });
                    });
                });
            </script>
@endsection