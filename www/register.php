<script type="text/javascript">
    var Validation = {
        compareReg: function(reg, obj) {
            if(reg.test($(obj).val())) {
                //console.log('ok');
                $(obj).parent('div').removeClass('has-error').addClass('has-success');
                $(obj).siblings('span.glyphicon').addClass('glyphicon-ok').removeClass('glyphicon-remove');
                return true;
            }else {
                //console.log($(obj).siblings('span.glyphicon'));
                $(obj).parent("div").removeClass('has-success').addClass('has-error');
                $(obj).siblings('span.glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
                return false;
            }
        },
        email: function(e, obj) {
            console.log("THIS = " + this);
            console.log(this);
            console.log(e);
            console.log(obj);

            var object = (obj == undefined) ? this:obj;
            var reg = /^[A-Za-z0-9_\.]{1,}@[A-Za-z0-9_\.]{1,}$/;
            return Validation.compareReg(reg, object);
        },
        login: function() {

        },
        pass: function(e, obj) {
            var object = (obj == undefined) ? this:obj;
            var reg = /^\w{6,50}$/;
            Validation.compareReg(reg, object);
        },
        confPass: function() {
            var pass = $('#formRegister input[name="userPass"]');
            if(pass.val() == $(this).val()) {
                $(this).parent('div').removeClass('has-error').addClass('has-success');
                $(this).siblings('p').css({"display": "block", "color": ""}).addClass('text-success').text("Пароли совпадают ^_^");
            }else {
                $(this).parent("div").removeClass('has-success').addClass('has-error');
                $(this).siblings('p').css({"display": "block", "color": "#f00"}).text("Пароли не совпадают!!!!");
            }
        },
        name: function() {

        },
        birthday: function() {

        },
        phone: function() {

        }
    };


    $(document).ready(function() {
        $('#tooltip').tooltip();
        $('#popover').popover();

        var form = $("#formRegister");

        form.find("input[name='userPass']").on('keyup', function() {
            var confirm = form.find("input[name='userPassConfirm']");
            if($(this).val() == '') {
                confirm.attr('disabled', 'disabled');
            }else {
                confirm.removeAttr('disabled');
            }
        });

        form.find("input[name='userEmail']").on('blur', Validation.email);
        form.find("input[name='userPass']").on('blur', Validation.pass);
        form.find("input[name='userPassConfirm']").on('blur', Validation.confPass);




        $("#formSend").on("click", function() {
            var Form = {};

            var email = form.find("input[name='userEmail']");
            var pass = form.find("input[name='userPass']");
            Form.email = Validation.email(event, email);
            Form.pass = Validation.pass(event, pass);

            for(cur in Form) {
                if (!Form[cur]) return false;
            }
            return true;
        });


    });
</script>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="min-height: 300px;">
                    <h1 class="page-header" style="margin-top: 0;">Регистрация</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <form id="formRegister" method="POST" action="register_handl.php">
                                <div class="form-group has-feedback">
                                    <label class="control-label"><span class="text-danger">*</span>Email</label>
                                    <input type="text" class="form-control" name="userEmail" placeholder="Email"  />
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">
                                        <span class="text-danger">*</span>Пароль
                                        <button style="border: 0; padding: 0;" type="button" class="btn btn-link" id="popover" data-toggle="popover" data-trigger="focus" title="Ограничение на пароль" data-content="Пароль не должен содержать менее 6 символов!">
                                            <span class="glyphicon glyphicon-question-sign"></span>
                                        </button>
                                    </label>
                                    <input type="text" class="form-control" name="userPass" placeholder="Пароль"  />
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        <span class="text-danger">*</span>Повторите пароль
                                        <a id="tooltip" data-toggle="tooltip" data-placement="top" title="Подвердите пароль!">
                                            <span class="glyphicon glyphicon-question-sign"></span>
                                        </a>
                                    </label>
                                    <input disabled type="text" class="form-control" name="userPassConfirm" placeholder="Пароль"  />
                                    <p style="display: none;" class="help-block"></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Имя</label>
                                    <input type="text" class="form-control" name="userName" placeholder="Имя" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">День рождения</label>
                                    <input type="text" class="form-control" name="userBDay" placeholder="День рождения" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Телефон</label>
                                    <input type="text" class="form-control" name="userPhone" placeholder="Телефон" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">О себе</label>
                                    <textarea style="resize: vertical;" rows="7" class="form-control" name="userInfo" placeholder="Сообщение"></textarea>
                                </div>
                                <div class="form-group">
                                    <input id="formSend" type="submit" class="btn btn-primary" value="Зарегистрировать" />
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>