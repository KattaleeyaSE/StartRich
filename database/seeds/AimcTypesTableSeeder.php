<?php

use Illuminate\Database\Seeder;

class AimcTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aimc_types')->insert([
              ['id' => 1, 'name' => 'EQSM'],               
              ['id' => 2, 'name' => 'EQLARGE'],               
              ['id' => 3, 'name' => 'EQGEN'],               
              ['id' => 4, 'name' => 'EQUS'],               
              ['id' => 5, 'name' => 'EQJP'],              
              ['id' => 6, 'name' => 'EQEU'],              
              ['id' => 7, 'name' => 'EQCH'],              
              ['id' => 8, 'name' => 'EQGL'],              
              ['id' => 9, 'name' => 'EQGEM'],              
              ['id' => 10, 'name' => 'EQASxJP'],               
              ['id' => 11, 'name' => 'EQIN'],               
              ['id' => 12, 'name' => 'EQASEAN'],               
              ['id' => 13, 'name' => 'EQHEALTH'],               
              ['id' => 14, 'name' => 'EQENERGY'],               
              ['id' => 15, 'name' => 'EQSET50'],               
              ['id' => 16, 'name' => 'FIXGOV'],               
              ['id' => 17, 'name' => 'FIXGEN'],               
              ['id' => 18, 'name' => 'FIXMIDGEN'],               
              ['id' => 19, 'name' => 'FIXLONGGEN'],               
              ['id' => 20, 'name' => 'FIXMMGOV'],               
              ['id' => 21, 'name' => 'FIXMMGEN'],               
              ['id' => 22, 'name' => 'FIXEMH'],               
              ['id' => 23, 'name' => 'FIXEMDISC'],               
              ['id' => 24, 'name' => 'FIXGLH'],               
              ['id' => 25, 'name' => 'FIXGLDISC'],               
              ['id' => 26, 'name' => 'MIXAGG'],               
              ['id' => 27, 'name' => 'MIXMOD'],               
              ['id' => 28, 'name' => 'MIXCONS'],               
              ['id' => 29, 'name' => 'MIX2FI'],               
              ['id' => 30, 'name' => 'PRFREE'],               
              ['id' => 31, 'name' => 'PRMIX'],               
              ['id' => 32, 'name' => 'PRFOPTH'],               
              ['id' => 33, 'name' => 'PRFOPMIX'],               
              ['id' => 34, 'name' => 'PRFOPGL'],               
              ['id' => 35, 'name' => 'COMINDEX'],               
              ['id' => 36, 'name' => 'COMENG'],               
              ['id' => 37, 'name' => 'COMPM'],               
              ['id' => 38, 'name' => 'COMAGR'],               
              ['id' => 39, 'name' => 'MISC']                                         
        ]);
    }
}
