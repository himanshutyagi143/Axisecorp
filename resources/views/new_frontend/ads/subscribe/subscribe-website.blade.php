@extends('new_frontend.layouts.app')
@section('content')
    @include('new_frontend.includes.header')
    <div class="layout">
        @include('new_frontend.includes.sidebar')
        <section class="contact-details">
            <div class="container">
                <div class="subscribe-container">

                    <h3 class="text-center">Please Fill Form To Subscribe Us!</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-block text-center show_msg_block" style="display: none;">
                              <strong>
                                <span class="show_msg"></span>
                              </strong>
                            </div>
                            <form method="POST" id="subscribe-form" style="border: 1px solid #f2f2f2;padding:0px 13px 13px;margin: 32px 30px;">
                                <div class="row">
                                    <div class="col-md-3" style="margin-top:13px">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required id="name" />
                                        <input type="hidden" name="page_reference" value="emailer" id="page_reference" />
                                    </div>
                                    <div class="col-md-3" style="margin-top:13px">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required id="email" />
                                    </div>
                                    <div class="col-md-3" style="margin-top:13px">
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone" id="phone" />
                                    </div>
                                    <div class="col-md-3" style="margin-top:13px">
                                        <input type="submit" name="submit-subscribe" class="btn btn-lg btn-success" value="Subscribe" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('new_frontend.includes.footer')
        <script type="text/javascript">
            $(document).ready(function(){
                $('.contacts').hide();

                $('#subscribe-form').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}}"},
                        url:"/add-subscriber",
                        method:"post",
                        data:{name:$('#name').val(),email:$('#email').val(),phone:$('#phone').val(),page_reference:$('#page_reference').val()},
                        success:function(response)
                        {
                          if(response.status == 1){
                            $('.show_msg_block').show();
                            $('.show_msg').text(response.msg);
                            $('#name').val('');
                            $('#email').val('');
                            $('#phone').val('');
                            setTimeout(function(){ $('.show_msg_block').hide(); }, 3000);
                          }
                        }
                    });
                });
              });
        </script>
@endsection