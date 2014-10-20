<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="min-height: 300px;">
                    <h1 class="page-header" style="margin-top: 0;">Комментарии =)</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="filework.php">
                                <div class="form-group col-md-4">
                                    <label class="control-label">Логин</label>
                                    <input type="text" class="form-control" name="userLogin" placeholder="Login" required />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Комментарий</label>
                                    <textarea rows="7" class="form-control" name="userComment" placeholder="Comment" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-danger" />
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <hr />
                            <?php showComments(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
