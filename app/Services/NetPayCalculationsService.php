<?php

namespace App\Services;

class NetPayCalculationsService
{
    /**
     * Create a new class instance.
     */
    public $gross_salary;

    public function __construct($gross_salary)
    {
        $this->gross_salary = $gross_salary;
    }
    public function getNssfDeduction()
    {
        $max = 4320;
        return min($this->gross_salary * 0.06,$max);
    }
    public function getShifDeduction()
    {
        return max($this->gross_salary * 0.0275,300);
    }
    public function getAhlDeduction()
    {
        return $this->gross_salary*0.015;
    }
    public function getDeductions()
    {
        return $this->getNssfDeduction() + $this->getShifDeduction() + $this->getAhlDeduction();
    }
    public function getTaxableIncome()
    {
        return $this->gross_salary-$this->getDeductions();
    }
    public function getPaye()
    {
        $level1 = [72012 / 12,0.1];
        $level2 = [96012 / 12,0.2];
        $level3 = [120012 / 12,0.34];
        $level4 = [2160012 / 12,0.37];
        
        $taxableIncome = $this->getTaxableIncome();
        $paye = 0;
        if ($taxableIncome >= $level1[0]) {
            $paye = $taxableIncome * $level1[1];
        }elseif($taxableIncome >= $level2[0]){
            $paye = ($level1[0] * $level1[1]) + (($taxableIncome-$level1[0]) * $level2[1]);
        }elseif($taxableIncome >= $level3[0]){
            $paye = ($level1[0] * $level1[1]) + (($level2[0]-$level1[0]) * $level2[1]) + (($taxableIncome-$level2[0]) * $level3[1]);
        }elseif($taxableIncome >= $level4[0]){
            $paye = ($level1[0] * $level1[1]) + (($level2[0]-$level1[0]) * $level2[1]) + (($level3[0]-$level2[0]) * $level3[1]) + (($taxableIncome-$level3[0]) * $level4[1]);
        }
        $relief = 2400;
        // $insuranceRelief = $this->getAhlDeduction() * 0.15;
        $paye -= $relief;
        $paye = max($paye,0);
        return $paye;
    }
    public function getNetPay()
    {
        return $this->gross_salary - $this->getDeductions();
    }
}
