<?php helper('App\Helpers\filtra_url'); ?>

<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<script>
    const local = document.querySelector('#time');

    function contar(duracao, onde) {
        let timer = duracao, minutes, seconds;

        setInterval(function () {

            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            onde.textContent = minutes + ":" + seconds;
            if (--timer < 0) {
                timer = 0;
                window.location.href = "<?=base_url('/project/'.$id)?>";
            }
        }, 1000);
    }

    window.onload = function () {
        let duracao = 10 * 60 * 1; // Converter para segundos
        contar(duracao, local); // iniciando o timer
    };

</script>
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
<!-- adicione o conteúdo principal aqui -->
<?php if(!$ready): ?>

<div class="text-center text-muted my-5">

    <div class="alert alert-info small">This is project ID <a href="<?=base_url('/project/'.$id)?>"><?=$id?></a>. When processing is complete, this page will automatically refresh.</div>

    <h1>PHASE is running...</h1>
    <h1 class="display-1" id="time"></h1>
    <p>Please, wait...</p>

</div>
<?php else: ?>
    <h1>The project is ready</h1>

    <div class="row mt-4">
        <div class="col-12 col-md-9 small">
            <table class="table table-hover table-striped" id="resultado">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>patient_id</th>
                        <th>1_haplotype</th>
                        <th>1_enzymatic_activity</th>
                        <th>1_allele</th>
                        <th>1_score</th>
                        <th>2_haplotype</th>
                        <th>2_enzymatic_activity</th>
                        <th>2_allele</th>
                        <th>2_score</th>
                        <th>total_score</th>
                        <th>phenotype</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="col-12 col-md-3 p-2 bg-light">
            <p class="text-muted">Download files:</p>
            <ul>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/final.csv'))?>">final.csv</a></li>

                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/halelos.csv'))?>">halelos.csv</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/pacientes.csv'))?>">pacientes.csv</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output'))?>">output</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_freqs'))?>">output_freqs</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_hbg'))?>">output_hbg</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_monitor'))?>">output_monitor</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_pairs'))?>">output_pairs</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_probs'))?>">output_probs</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_recom'))?>">output_recom</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/log.txt'))?>">log.txt</a></li>
            </ul>
        </div>
    </div>
    

<?php endif; ?>

<script>

    $(()=>{
        fetch('<?=filtra_url(base_url("/data/$id/final.csv"))?>')
            .then(response => response.text())
            .then(dados => {

                // console.log('datatable:', dados)
                $('#resultado').DataTable({
                    data: dados.split('\n')
                        .filter(j=>(j.substr(0,1) != ','))
                        .map(i=>{
                            itens = i.split(',')
                            console.log(itens)
                            return [i]
                        })
                })
            })
        
    })

</script>

<?= $this->endSection() ?>
