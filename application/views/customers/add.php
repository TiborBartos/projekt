<div class="container" >
<h3>Pridať nový prenájom</h3>
<a href="<?php echo base_url('home/index'); ?>" class="btn btn-primary"> Späť </a>
<form action="<?php echo base_url('home/add_add') ?>" method="post" class="from-horizontal">
    <div class="from-gorup">
        <label for="Meno" class="col-md-2 text-right">Meno:</label>
        <div class="col-md-10">
            <input type="text" name="txt_Meno" class="form-control" required>
        </div>
    </div>
    <div class="from-gorup">
        <label for="Cas_prenajmu" class="col-md-2 text-right">Čas prenajmu:</label>
        <div class="col-md-10">
            <input type="text" name="txt_Cas_prenajmu" class="form-control" value="<?php echo @date('Y-m-d H:i:s'); ?>" >
        </div>
    </div>
    <div class="from-gorup">
        <label for="Doba_prenajmu" class="col-md-2 text-right">Doba prenajmu:</label>
        <div class="col-md-10">
            <input type="text" name="txt_Doba_prenajmu" class="form-control" >
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-lg-6">
                <div class="form-group">
                    <select class="form-control" name="id">
                        <option value="">Vybrať športovisko</option>
                        <?php if (count($sportoviska_data)): ?>
                        <?php foreach ($sportoviska_data as $get_sportovisko): ?>
                            <option name="txt_Sportovisko" value="<?php echo $get_sportovisko->id ?>"><?php echo $get_sportovisko->Nazov?></option>
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
            <input type="submit" name="btnSave" class="btn btn-primary" value="Uložiť">
        </div>
    </div>
</form>

<form action="<?php echo base_url('home/submit_sport') ?>" method="post" class="from-horizontal">
<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <th>Aktuálne športoviská</th>
        <th>Cena za hodinu (€)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($sportoviska_data)
    {
        foreach ($sportoviska_data as $get_sportovisko)
        {
            ?>
            <tr>
                <td><?php echo $get_sportovisko->Nazov; ?></td>
                <td><?php echo $get_sportovisko->Cena_za_hodinu; ?></td>
            </tr>
            <?php
        }
    }

    ?>
    </tbody>
</table>
</form>
