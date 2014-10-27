<?php
    $user = unserialize($_SESSION['userInfo']);
?>

<script type="text/javascript">

    $(document).ready(function() {

        $("#btnSave").hide();

        $("#btnUpdate").on({
            click: function() {
                $("#userInfoForm").find(".form-control").each(function(i, e) {
                    if(i != 0) {
                        $(e).removeAttr('disabled');
                    }
                });
                $("#btnSave").slideDown();
                $(this).attr("disabled", "disabled");
            }
        });
    });

</script>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="min-height: 300px;">
                    <h1 class="page-header" style="margin-top: 0;">Привет <?=$user->getName()?></h1>
                    <div class="row">
                        <div class="col-md-3">
                            <img class="thumbnail" style="width: 100%; height: 250px;">
                        </div>
                        <div class="col-md-9">
                            <form id="userInfoForm" method="POST" action="upuserinfo_handl.php">
                                <div class="form-group col-md-4">
                                    <label class="control-label"><span class="text-danger">*</span>Email</label>
                                    <input type="text" class="form-control" value="<?=$user->getEmail()?>" name="userEmail" placeholder="Email" disabled />
                                    <br />

                                    <label class="control-label">Имя</label>
                                    <input type="text" class="form-control" name="userName" value="<?=$user->getName()?>" placeholder="Имя" disabled/>
                                    <br />
                                    <label class="control-label">День рождения</label>
                                    <input type="text" class="form-control" name="userBDay" value="<?=$user->getBirthday()?>" placeholder="День рождения" disabled />
                                    <br />
                                    <label class="control-label">Телефон</label>
                                    <input type="text" class="form-control" name="userPhone" value="<?=$user->getPhone()?>" placeholder="Телефон" disabled />
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">О себе</label>
                                    <textarea disabled rows="7" class="form-control" name="userInfo" placeholder="Сообщение"><?=$user->getInfo()?></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <input id="btnUpdate" type="button" class="btn btn-primary" value="Редактировать" />
                                    <input id="btnSave" type="button" class="btn btn-success" value="Сохранить изменения" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>