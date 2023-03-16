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
    <p class="text-muted">Download files:</p>
    <ul>
        <li><a href="<?=base_url('/data/'.$id.'/halelos.csv')?>">halelos.csv</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/pacientes.csv')?>">pacientes.csv</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/output')?>">output</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/output_freqs')?>">output_freqs</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/output_hbg')?>">output_hbg</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/output_monitor')?>">output_monitor</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/output_pairs')?>">output_pairs</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/output_probs')?>">output_probs</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/output_recom')?>">output_recom</a></li>
        <li><a href="<?=base_url('/data/'.$id.'/log.txt')?>">log.txt</a></li>
    </ul>

<?php endif; ?>


<?= $this->endSection() ?>
