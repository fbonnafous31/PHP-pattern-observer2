<?php

    namespace App;

    class DonneesMeteo implements \SplSubject {

        private array $observateurs;
        private float $temperature;
        private float $humidite;
        private float $pression;

        public function attach(\SplObserver $observateur): void {
            $this->observateurs[] = $observateur;
        }

        public function detach(\SplObserver $observateur): void {
            $key = array_search($observateur, $this->observateurs); 
            if (false !== $key) {
                unset($this->observateurs[$key]);
            }
        }   

        public function notify(): void {
            foreach ($this->observateurs as $observateur) {
                $observateur->update($this);
            }
        }

        public function actualiserMesures(): void {
            $this->notify();
        }

        // setter
        public function setMesures (float $temperature, float $humidite, float $pression): void {
            $this->temperature = $temperature;
            $this->humidite = $humidite;
            $this->pression = $pression;
            $this->actualiserMesures();
        }

        // getter
        public function getTemperature() {
            return $this->temperature;
        }

        public function getHumidite() {
            return $this->humidite;
        }

        public function getPression() {
            return $this->pression;
        }

    }

?>