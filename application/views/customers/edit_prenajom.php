
<h3>Úprava údajov</h3>
<a href="<?php echo base_url('home/index'); ?>" class="btn btn-primary"> Späť </a>

<form action="<?php echo base_url('home/update_prenajom') ?>" method="post" class="from-horizontal">

    <input type="hidden" name="txt_hidden_id" value="<?php echo $zakaznici_data->id; ?>">
    <div class="from-gorup">
        <label for="Meno" class="col-md-2 text-right">Doba prenájmu</label>
        <div class="col-md-10">
            <input type="text" value="<?php echo $zakaznici_data->Doba_prenajmu; ?>" name="txt_Doba_prenajmu" class="form-control">
        </div>
    </div>

    <input type="hidden" name="txt_hidden" value="<?php echo $zakaznici_data->Cas_prenajmu; ?>">
    <div class="from-gorup">
        <label for="Meno" class="col-md-2 text-right">Čas prenájmu</label>
        <div class="col-md-10">
            <input type="text" value="<?php echo $zakaznici_data->Cas_prenajmu; ?>" name="txt_Cas_prenajmu" class="form-control">
        </div>
    </div>

    <div class="from-gorup">
        <label  class="col-md-2 text-right"></label>
        <div class="col-md-10">
            <input type="submit" name="btnUpdate" class="btn btn-primary" value="Upraviť">
        </div>
    </div>
</form>

