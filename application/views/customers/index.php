<!DOCTYPE html>

    <?php
        if($this->session->flashdata('success_msg'))
        {
         ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success_msg'); ?>
            </div>
        <?php
        }
    ?>
    <?php
        if($this->session->flashdata('error_msg'))
        {
        ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error_msg'); ?>
            </div>
        <?php
        }
    ?>
    <a href="<?php echo base_url('home/add_add'); ?>" class="btn btn-primary" > Pridať </a>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Meno</th>
            <th>Športovisko</th>
            <th>Čas prenajmu</th>
            <th>Počet hodín</th>
            <th>Cena za hodinu (€)</th>
            <th>Celková cena (€)</th>
            <th>Akcia</th>
        </tr>
        </thead>
        <tbody>
            <?php
                if ($get_zakaznici_data)
                {
                    foreach ($get_zakaznici_data as $get_zakaznik_data) {
                        ?>
                        <tr>
                            <td><?php echo $get_zakaznik_data->zakaznik_meno; ?></td>
                            <td><?php echo $get_zakaznik_data->Nazov; ?></td>
                            <td><?php echo $get_zakaznik_data->Cas_prenajmu; ?></td>
                            <td><?php echo $get_zakaznik_data->Doba_prenajmu; ?></td>
                            <td><?php echo $get_zakaznik_data->Cena_za_hodinu; ?></td>
                            <td><?php echo $get_zakaznik_data->Cena_za_hodinu * $get_zakaznik_data->Doba_prenajmu; ?></td>
                            <td>
                                <a href="<?php echo base_url('home/edit_meno/' .$get_zakaznik_data->join_id); ?>" class="btn btn-success">Upraviť Meno</a>
                                <a href="<?php echo base_url('home/edit_sport/' .$get_zakaznik_data->join_id); ?>" class="btn btn-info">Upraviť Športovisko</a>
                                <a href="<?php echo base_url('home/edit_prenajom/' .$get_zakaznik_data->join_id); ?>" class="btn btn-primary">Upraviť Prenájom</a>

                                <a href="<?php echo base_url('home/delete/' .$get_zakaznik_data->join_id); ?>" class="btn btn-danger" onclick="return confirm('Chcete vymazať tento záznam?');">Vymazať</a>
                            </td>
                        </tr>
                        <?php
                    }
                }

            ?>
        </tbody>
    </table>
