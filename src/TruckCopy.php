<?php

namespace App;

class TruckCopy extends Truck
{
    protected $bodyColor;

    private function setBodyColor($color)
    {
        $this->bodyColor = $color;
    }

    public function getTruckHtml($color, $text)
    {
        $this->setBodyColor($color);
        $this->setText($text);

        return '
            <div class="truck_container">
                <div class="truck_body" style="background-color: '.$this->bodyColor.'">
                    <div class="truck_text">'.$this->truckText.'</div>
                </div>
                <div class="truck_chassis">
                    <div class="truck_head"></div>
                    <div class="truck_base">
                        <div class="truck_vertical_base"></div>
                        <div class="truck_horizontal_base"></div>
                    </div>
                    <div class="truck_wheels_container">
                        <div class="truck_wheel truck_front_wheel">
                            <div class="truck_spoke"></div>
                        </div>
                        <div class="truck_wheel truck_back_wheel">
                            <div class="truck_spoke"></div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}