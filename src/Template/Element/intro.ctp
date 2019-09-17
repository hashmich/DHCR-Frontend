<?php
use Cake\Routing\Router;
?>

<div id="intro" class="overlay">
    <div class="overlay-container">
        <h1>
            <a href="<?= Router::url('/') ?>">
                <span id="h1">Digital Humanities</span><br>
                <span id="h2">Course</span><span id="h3">Registry</span>
            </a>
        </h1>
        <?= $this->Html->link($this->Html->image('CLARIN-DARIAH-joint-logo-big.png', [
            'alt' => 'CLARIN-DARIAH joint logo',
            'width' => 256,
            'height' => 200]), '/', ['escape' => false, 'class' => 'img']) ?>
        <p>
            The Digital Humanities Course Registry is a joint effort of two
            European research infrastructures:
            <em>CLARIN ERIC</em> and <em>DARIAH-EU</em>.
        </p>
        <p>
            It provides a curated database of teaching activities in the
            field of digital humanities worldwide.
        </p>
    </div>
    <div class="overlay-container transparent"></div>
    <div class="overlay-container flex-columns">
        <div class="flex-item">
            <h2>Students</h2>
            <p>
                Students can find information about programmes and courses
                in digital humanities offered in various places and universities.
            </p>
        </div>
        <div class="flex-item">
            <h2>Lecturers</h2>
            <p>
                Lecturers or administrators can promote their teaching
                activities on the platform. <br />
                To add data, lecturers need to sign in.
            </p>
        </div>
    </div>
    <div class="overlay-container flex-columns">
        <div class="flex-item"><button class="blue" id="start">Go to Start</button></div>
        <div class="flex-item"><button>More Information</button></div>
    </div>
</div>