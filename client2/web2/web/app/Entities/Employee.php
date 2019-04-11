<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use Carbon\Carbon;
use DB;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;

class Employee extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at',
        'date_status',
        'birthday'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'code' => 'Matrícula',
        'cpf' => 'CPF',
        'name' => 'Nome',
        'address' => 'Endereço',
        'zip_code' => 'CEP',
        'neighborhood' => 'Bairro',
        'phone' => 'Telefone',
        'mobile' => 'Celular',
        'email' => 'e-mail', 
        'city_id' => 'Cidade',
        'company_position_id' => 'Cargo',
        'company_responsibility_id' => 'Função',
        'employee_status_id' => 'Situação',
        'employee_status_reason_id' => 'Motivo desligamento',
        'gender_id' => 'Sexo',
        'date_status' => 'Data Situação',
        'comments' => 'Observações',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionFormattedFields = [
        'birthday' => 'datetime:d/m/Y',
        'date_status' => 'datetime:d/m/Y'
        ];

    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    protected $fillable = [
        'code',
        'cpf',
        'name',
        'address',
        'zip_code',
        'neighborhood',
        'phone',
        'mobile',
        'email', 
        'city_id',
        'company_position_id',
        'company_responsibility_id',
        'management_unit_id',
        'company_sector_id',
        'company_sub_sector_id',
        'employee_status_id',
        'employee_status_reason_id',
        'gender_id',
        'date_status',
        'birthday',
        'comments'
    ];
  
    public function getCpfMaskAttribute($value)
    {
        $value = $this->cpf;

        $cpf_mask = Utils::mask($value, Mask::CPF);

        return $cpf_mask;
    }

    public function getZipCodeMaskAttribute($value)
    {
        $value = $this->zip_code;
        
        $zip_code_mask = Utils::mask($value, Mask::CEP);

        return $zip_code_mask;
    }

    public function getPhoneMaskAttribute($value)
    {
        $value = $this->phone;
        
        $phone_mask =  Utils::mask($value, '(##) ####-####');

        return $phone_mask;
    }

    public function getMobileMaskAttribute($value)
    {
        $value = $this->mobile;
        
        $mobile_mask = Utils::mask($value, '(##) #####-####');
        
        return $mobile_mask;
    }

    public function setDateAafcIniAttribute($value)
    {
        return $this->attributes['date_aafc_ini'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setDateAafcFimAttribute($value)
    {
        if(!is_null($value))
        {
            return $this->attributes['date_aafc_fim'] = Carbon::parse($value)->format('Y-m-d');
        }
    }

    public function setBirthdayAttribute($value)
    {
        if(!is_null($value))
        {
            return $this->attributes['birthday'] = Carbon::parse($value)->format('Y-m-d');
        }
    }

    public function city()
    {
        return $this->belongsTo('SisCad\Entities\City'); 
    }

    public function gender()
    {
        return $this->belongsTo('SisCad\Entities\Gender');   
    }

    public function employee_status()
    {
        return $this->belongsTo('SisCad\Entities\EmployeeStatus');  
    }

    public function employee_status_reason()
    {
        return $this->belongsTo('SisCad\Entities\EmployeeStatusReason');   
    }

    public function management_unit()
    {
        return $this->belongsTo('SisCad\Entities\ManagementUnit'); 
    }

    public function company_position()
    {
        return $this->belongsTo('SisCad\Entities\CompanyPosition');   
    }

    public function company_responsibility()
    {
        return $this->belongsTo('SisCad\Entities\CompanyResponsibility');   
    }

    public function company_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySector');   
    }

    public function company_sub_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySubSector');   
    }

    public function employee_movements()
    {
        return $this->hasMany('SisCad\Entities\EmployeeMovement'); 
    }

    public function patrimonials()
    {
        return $this->hasMany('SisCad\Entities\Patrimonial');   
    }
}
