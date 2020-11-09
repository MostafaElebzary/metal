<?php

namespace App\Exports;

use App\User;
use App\Reciept;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $branch_id)
    {
        $this->branch_id = $branch_id;
    }
    public function view(): View
    { 
        $users = User::where('branch_id', $this->branch_id)->get();

        $usersid[] = null;
        foreach ($users as $key => $user) {
            $userid[$key] = $user->id;
        }
 
        return view('userstatistic.excel', [
            'users' => User::where('branch_id', $this->branch_id)->get(),
            'reciept' => Reciept::where('type', 'قبض')->whereIn('user_id', $userid)->sum('amount')


        ]);
    }
}
