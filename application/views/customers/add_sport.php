<div class="container" >
<h3>Pridať nové športovisko</h3>
<a href="<?php echo base_url('home/index'); ?>" class="btn btn-primary"> Späť </a>
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
                    <td>
                        <a href="<?php echo base_url('home/delete_sportovisko/' .$get_sportovisko->id); ?>" class="btn btn-danger">Vymazať</a>
                    </td>
                </tr>
                <?php
            }
        }

        ?>
        </tbody>
    </table>
    <div class="from-gorup">
        <label for="add_sport" class="col-md-2 text-right">Pridať športovisko:</label>
        <div class="col-md-10">
            <input type="text" name="txt_add_sport" class="form-control" required>
        </div>
    </div>
    <div class="from-gorup">
        <label for="add_cena" class="col-md-2 text-right">Pridať cenu:</label>
        <div class="col-md-10">
            <input type="text" name="txt_add_cena" class="form-control" required>
        </div>
    </div>
    <div class="from-gorup">
        <label  class="col-md-2 text-right"></label>
        <div class="col-md-10">
            <input type="submit" name="btnAdd" class="btn btn-primary" value="Pridať">
        </div>
    </div>
</form>
</div>