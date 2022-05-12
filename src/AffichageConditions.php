<?php

    namespace App;

    class AffichageConditions implements \SplObserver, Affichage {

        public function __construct(\SplSubject $donneesMeteo) {
            $this->donneesMeteo = $donneesMeteo;
            $this->donneesMeteo->attach($this);
        }

        public function update(\SplSubject $subject): void {
            $this->afficher($subject);
        }

        public function afficher(\SplSubject $subject) {
            echo "Conditions actuelles : ". $subject->getTemperature() . " degrés C et " . $subject->getHumidite() . " % d'humidité";
        }

    }

?>