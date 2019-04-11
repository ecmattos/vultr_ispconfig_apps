<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

/**
 * Class MeetingMember.
 *
 * @package namespace SisCad\Entities;
 */
class MeetingMember extends Revisionable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'meeting_id' => 'UF', 
        'member_id' => 'UF', 
        'expected_qty' => 'UF',
		'expected_qty_companion' => 'UF',
		'expected_qty_companion_extra' => 'UF',
		'confirmed_qty' => 'UF',
		'confirmed_qty_companion' => 'UF',
		'confirmed_qty_companion_extra' => 'UF',
        'comments' => 'UF',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
        'meeting_id', 
        'member_id', 
        'checked', 
        'expected_qty',
		'expected_qty_companion',
		'expected_qty_companion_extra',
		'confirmed_qty',
		'confirmed_qty_companion',
		'confirmed_qty_companion_extra',
        'comments'
    ];

    public function member()
    {
        return $this->belongsTo('SisCad\Entities\Member');   
    }
}
