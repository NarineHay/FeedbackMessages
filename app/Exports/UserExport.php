<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $records = User::with('messages')->get();
        $result = array();
        foreach($records as $record){
            $text = '';
            if($record->messages->count() > 0){
                foreach ($record->messages as $key => $value) {
                    $text .= $key+1 .". $value->text \n";
                }
            }

           $result[] = array(array(
              'id'=>$record->id,
              'name' => $record->name,
              'email' => $record->email,
              'text[]' => $text,
              'created_at' => $record->created_at

           ));

        }

        return collect($result);
    }

    public function headings(): array
    {
        return [
          '#',
          'Имя',
          'Эл. адрес',
          'Текст',
          'Дата'
        ];
    }
}
