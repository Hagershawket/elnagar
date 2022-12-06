<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupplierImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supplier([
            'reference_no'       => $row['reference_no'],
            'name'               => $row['name'],
            'phone'              => $row['phone'],
            'alternate_phone'    => $row['alternate_phone'],
            'address'            => $row['address'],
            'image'              => 'images/suppliers/' . $row['image'],
            'start_deal'         => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_deal']),
            'due_amount'         => $row['due_amount'],
            'standard'           => $row['standard'],
            'is_active'          => 1,
        ]);
    }
}
