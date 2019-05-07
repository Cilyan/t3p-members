<?php

namespace App\Exports;

use App\Edition;
use App\Helper;
use Propaganistas\LaravelPhone\PhoneNumber;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class HelpersExport implements FromQuery, Responsable, WithMapping, WithHeadings, WithColumnFormatting
{
    use Exportable;

    private $fileName = 'helpers.xlsx';
    private $edition;

    public function __construct(Edition $edition)
    {
        $this->edition = $edition;
    }

    public function query()
    {
        return $this->edition->helpers()
            ->join('profiles', 'helper.profile_id', '=', 'profiles.id')
            ->join('users', 'profiles.user_id', '=', 'users.id')
            ->orderBy('profiles.last_name', 'asc')
            ->orderBy('profiles.first_name', 'asc');
    }

    /**
    * @var Helper $helper
    */
    public function map($helper): array
    {
        if ($helper->profile->phone) {
            try {
                $phone = PhoneNumber::make($helper->profile->phone, $helper->profile->country)->formatForMobileDialingInCountry('FR');

            }
            catch (NumberParseException $e) {
                try {
                    $phone = PhoneNumber::make($helper->profile->phone)->formatForMobileDialingInCountry('FR');
                }
                catch (NumberParseException $e) {
                    $phone = "Invalid";
                }
            }
        }
        else {
            $phone = null;
        }
        return [
            $helper->profile->id,
            $helper->profile->first_name,
            $helper->profile->last_name,
            $helper->profile->user->email,
            $phone,
            $helper->phone_provider,
            $helper->first_responder ? __('Yes') : __('No'),
            Date::dateTimeToExcel($helper->profile->birthday),
            $helper->legal_age ? __('Yes') : __('No'),
            $helper->profile->tshirt_gender,
            strtoupper($helper->profile->tshirt_size),
            $helper->driving_license,
            $helper->driving_license_location,
            $helper->sleep_day_before ? __('Yes') : __('No'),
            $helper->day_before_meal ? __('Yes') : __('No'),
            $helper->after_event_meal ? __('Yes') : __('No'),
            $helper->housing,
            $helper->prefered_activity,
            $helper->prefered_sector,
            null,
            null,
            $helper->comment,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __('First Name'),
            __('Last Name'),
            __('E-Mail Address'),
            __('Phone'),
            __('Phone Operator'),
            __('I have a valid first responder diploma'),
            __('Birthday'),
            __('I will be of legal age at the date of the trail'),
            __('T-shirt'),
            __('Size'),
            __('Driving License ID'),
            __('Driving License Delivery Location'),
            __('I will sleep on the spot the day before'),
            __('I will be taking the meal the day before'),
            __('I will participate to the after-event meal'),
            __('Housing (info/request)'),
            __('Prefered Activity'),
            __('Prefered Sector'),
            __('Zone'),
            __('Position 1'),
            __('Position 2'),
            __('Other comments'),
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'I' => NumberFormat::FORMAT_TEXT,
            'J' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT,
            'L' => NumberFormat::FORMAT_TEXT,
            'M' => NumberFormat::FORMAT_TEXT,
            'N' => NumberFormat::FORMAT_TEXT,
            'O' => NumberFormat::FORMAT_TEXT,
            'P' => NumberFormat::FORMAT_TEXT,
            'Q' => NumberFormat::FORMAT_TEXT,
            'R' => NumberFormat::FORMAT_TEXT,
            'S' => NumberFormat::FORMAT_TEXT,
            'T' => NumberFormat::FORMAT_TEXT,
            'U' => NumberFormat::FORMAT_NUMBER,
            'V' => NumberFormat::FORMAT_NUMBER,
            'W' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
