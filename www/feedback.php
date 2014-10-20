<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="min-height: 300px;">
                    <h1 class="page-header" style="margin-top: 0;">Форма обратной связи</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="">
                                <div class="form-group col-md-4">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" name="userEmail" placeholder="Email" required />
                                    <br>
                                    <label class="control-label">Имя</label>
                                    <input type="text" class="form-control" name="userLogin" placeholder="Имя" required />
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Сообщение</label>
                                    <textarea rows="7" class="form-control" name="userComment" placeholder="Сообщение" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-danger" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>