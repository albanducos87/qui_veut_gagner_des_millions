<canvas id="canvas3d"></canvas>


<div class="game">

    <div class="palier-box">
    <?php 
        require_once('./components/palier.php')
    ?>
    </div>

    <aside>
    <?php 
        require_once('./components/indices.php')
    ?>

    </aside>

    <div class="QandA">
    <?php 
        require_once('./components/question.php');
        require_once('./components/reponses.php');
    ?>
    </div>
    

</div>
<!-- Scripts -->
<script type="module">
    import { Application } from './runtime.js'; const app = new Application(); app.load('./scene.json');
</script>

<style> 

.game {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 100000;
    background-color: rgba(255, 255, 255, 0);
}

.QandA {
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 70%;
    transform: translateX(-50%);
}

aside { 
    position: absolute;
    right: 20px;
    top: 20px;
    width: 10%;
}

.palier-box {
    position: absolute;
    left: 20px;
    top: 20px;
    width: 10%;
    height: 90%;
}

</style>