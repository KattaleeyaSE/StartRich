<?php 
namespace App\Helpers;

class TypeConverter
{

    public static function mapAIMCType($id)
    { 
        $aimcType = TypeConverter::getAIMCType(); 
        return $aimcType[$id-1];
    }

    public static function mapNormalType($id)
    { 
        $type = TypeConverter::getNormalType(); 
        return $type[$id-1];
    }


    private static function getNormalType()
    {
        return [ 'Equity fund','General fixed income fund','Long-term fixed income fund','Short-term fixed income fund','Balanced fund','Flexible portfolio fund','Fund of funds',
                'Warrant fund','Sector fund','Money market fund'];
    }

    private static function getAIMCType()
    {
        return [ 'EQSM',  'EQLARGE', 'EQGEN', 'EQUS', 'EQJP', 'EQEU', 'EQCH', 'EQGL', 'EQGEM', 'EQASxJP', 'EQIN',
                'EQASEAN','EQHEALTH','EQENERGY','EQSET50','FIXGOV','FIXGEN','FIXMIDGEN','FIXLONGGEN','FIXMMGOV','FIXMMGEN','FIXEMH',
                'FIXEMDISC','FIXGLH','FIXGLDISC','MIXAGG','MIXMOD','MIXCONS','MIX2FI','PRFREE','PRMIX','PRFOPTH','PRFOPMIX','PRFOPGL',
                'COMINDEX','COMENG','COMPM','COMAGR','MISC'];
    }
}