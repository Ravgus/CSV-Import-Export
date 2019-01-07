<div class="col-auto">
    <h1>Upload file</h1>
</div>
<div class="col-12">
    <form enctype="multipart/form-data" method="post" action="/import">
        <div class="form-group">
            <input type="file" class="form-control-file" name="file" accept=".csv" required/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Import"/>
        </div>
    </form>
    <div class="form-group">
        <a href="/results" class="btn btn-primary" role="button">View result</a>
    </div>
    <form method="post" action="/delete">
        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Clear all records"/>
        </div>
    </form>
</div>
