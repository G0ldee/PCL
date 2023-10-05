<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use App\Models\Loan;
use App\Models\Request;
use App\Models\Document;
use App\Models\DocInfo;
use Livewire\WithPagination;


class LoansTable extends Component
{
        use WithPagination;

        public $doctype = 'mem';
        public $docsearch = '';
        public $memsearch = '';

        public $currentdocs = [
            'Author' => '',
            'Year' => '',
            'ISBN' => '',
            'Type' => '',
            'Genre' => ''
        ];
    public function render()
    {
        return view('livewire.loans-table', [
            'docs'=> Document::all(),
            'docinfos'=> DocInfo::all(),
            'loans'=> Loan::all(),
            'requests'=> Request::all(),
            'members' => Member::all()
        ]);
    }
}
