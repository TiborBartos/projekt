
<h3>Úprava údajov</h3>
<a href="<?php echo base_url('home/index'); ?>" class="btn btn-primary"> Späť </a>

<form action="<?php echo base_url('home/update_sport') ?>" method="post" class="from-horizontal">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-lg-6">

                <div class="form-group">
                    <select class="form-control" name="id">
                        <option value="">Zmeniť športovisko</option>
                        <?php if (count($sportoviska_data)): ?>
                            <?php foreach ($sportoviska_data as $get_sportovisko): ?>
                                <option name="txt_Sportovisko" id="txt_id" value="<?php echo $get_sportovisko->id ?>"><?php echo $get_sportovisko->Nazov?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div class="from-gorup">
        <label  class="col-md-2 text-right"></label>
        <div class="col-md-10">
            <input type="submit" name="btnUpdate" class="btn btn-primary" value="Upraviť">
        </div>
    </div>
    &nbsp;
</form>


