<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\DocInfo;
use App\Models\Document;
use App\Models\Loan;
use App\Models\Type;
use App\Models\Genre;
use App\Models\Member;
use App\Models\Password;
use App\Models\User;
use App\Models\UserType;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use PDOException;

class UserController extends Controller
{
    public function create()
    {
        return view('layouts.login', [
            'user' => UserType::all(),
            'message' => ''

        ]);
    }

    public function login(Request $request)
    {
        $loginCreds = $request->validate([
            'userid' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('Id',$loginCreds['userid'])->get();
        try{
        if($user[0] != null){
            //dd($user);
            $pass = Password::where('Id', $user[0]['Pass'])->get();
            if(password_verify($request['password'], $pass[0]['PassHash'])){
               Session::put('name', $user[0]['LName']);
                //dd($_SESSION['name']);
                return redirect('home/')->with('message', 'logged in');
            }else{
                return view('layouts.login', [
                    'user' => UserType::all(),
                    'message' => 'Login Failed'
                ]);
            }
        }}
        catch(Exception $e){
            return view('layouts.login', [
                'user' => UserType::all(),
                'message' => 'Login Failed'
            ]);//return redirect('layouts.login')->with('message', 'Login failed');      
        //UserController::go_home()
        //$this->go_home();
        }
    }

   public function create_home()
   {
        return view ('layouts.home', [
            'docs' => Document::all(),
            'users' => User::all(),
            'members' => Member::all(),
            'requests' => \App\Models\Request::all(),
            'loans' => Loan::all(),
            'transactions' => Transaction::all(),
            'name' => Session::get('name')
        ]);
   }

   public function show_loan_page()
   {
        return view ('layouts.loanpage', [
            'docs' => Document::all(),
            'users' => User::all(),
            'members' => Member::all(),
            'loans' => Loan::all()
        ]);
   }

   public function show_tables_page()
    {
        $details = [
            'categories' => Category::all(),
            'docs' => Document::all(),
            'types' => Type::all(),
            'genres' => Genre::all(),
            'tbltype' => 'doc'
        ];
        return view('layouts.tables', [
            'details' => $details
        ]);
    }

    public function create_new_loan_page()
    {
        return view('layouts.newloanform', [
            'requests' => \App\Models\Request::where(['Accepted' => 1])->get()
        ]);
    }

   public function show_request_form()
   {
        return view ('layouts.newrequest', [
            'docs' => DocInfo::all(),
            'members' => Member::all(),
        ]);
   }

   public function show_return_form()
   {
        return view ('layouts.returnform', [
            'loans' => Loan::all()
        ]);
   }


   public function document_search()
   {
        $details = [
            'categories' => Category::all(),
            'types' => Type::all(),
            'genres' => Genre::all()
        ];
        return view ('layouts.docsearch', [
            'docs' => Document::all(),
            'docinfos' => DocInfo::all(),
            'details' => $details
        ]);
   }

   public function search(Request $request)
   {
        $docs = Document::all();
        if($request->category != ""){
            $cat = Category::whereCategory($request->category)->get();
            echo $cat[0]['Id'];
            $docs = $docs->where('Category', $cat[0]['Id']);
        }
        if($request->type != ""){
            $type = Type::whereType($request->type)->get();
            $docs = $docs->where('Type', $type[0]['Id']);
            
        }
        if($request->genre != ""){
            $genre = Genre::whereGenre($request->genre)->get();
            $docs = $docs->where('Genre', $genre[0]['Id']);
        }
        $details = [
            'categories' => Category::all(),
            'types' => Type::all(),
            'genres' => Genre::all()
        ];
        return view ('layouts.docsearch', [
            'docs' => $docs,
            'docinfos' => DocInfo::all(),
            'details' => $details
        ]);
   }

   public function process_request_page()
    {
        return view('layouts.processrequest', [
            'requests' => \App\Models\Request::all()
        ]);
    }
    
    public function new_user()
    {
        return view('layouts.newuser', [
            'user' => UserType::all()
        ]);
    }
    public function new_member()
    {
        return view('layouts.newmember', [
            'user' => UserType::all()
        ]);
    }

    public function create_member(Request $request)
    {
        #dd($request);

        try
        {
            $info = $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'streetnum' => 'required',
                'streetname' => 'required',
                'city' => 'required',
                'province' => 'required'
            ]);
            Address::create([
                'Number' => $info['streetnum'],
                'Street' => $info['streetname'],
                'City' => $info['city'],
                'Province' => $info['province']
            ]);

            $addyId = Address::where('Number', $info['streetnum'])->get(['Id']);
            ContactInfo::create([
                'Phone' => $info['phone'],
                'Email' => $info['email']
            ]);

            $contactId = ContactInfo::where('Email',$info['email'])->get(['Id']);
            Member::create([
                'FName' => $info['fname'],
                'LName' => $info['lname'],
                'Address' => $addyId[0]['Id'],
                'ContactInfo' => $contactId[0]['Id']
            ]);
        return redirect('home/');
        } catch(PDOException $e) { dd($e); }

    }

    public function create_user(Request $request)
    {
        #dd($request);
        try
        {
            $info = $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'utype' => 'required',
                'pass' => 'required',
                'pass2' => 'required',
                
            ]);
            $password_hash = password_hash($request->pass, PASSWORD_DEFAULT);

            Password::create([
                "PassHash" => $password_hash
            ]);
            $passId = Password::where('PassHash',$password_hash)->get(['Id']);
            $utypeId = UserType::where('Type',$request->utype)->get('Id');
            
            User::create([
                'Id' => "lp",
                'FName' => $info['fname'],
                'LName' => $info['lname'],
                'UserType' => $utypeId[0]['Id'],
                'Pass' => $passId[0]['Id']
            ]);
            return redirect('home/');
        } catch(PDOException $e) { dd($e); }
    } 
    public function create_request(Request $request)
    {
        #dd($request);

        try
        {
            $info = $request->validate([
                'memid' => 'required',
                'docid' => 'required',
                'date' => 'required'
            ]);
            $returndate = date("Y-m-d", strtotime($info['date']. "+ 2 weeks"));
            $time = date("Y-m-d h:i:s", time());
            $docid = Document::where("DocInfo", $info['docid'])->get();
            \App\Models\Request::create([
                'MemberId' => $info['memid'],
                'DocumentId' => $docid[0]['Id'],
                'RequestDate' => $time,
                'StartDate' => $info['date'],
                'EndDate' => $returndate,
                'Accepted' => 0
            ]);
        
        return redirect('/loanpage');

        } catch(PDOException $e) { dd($e); }
  
    }

    public function process_request(Request $request)
    {
        //dd($request);
        $info = $request->validate([            
                'requestid' => 'required',
                'action' => 'required',
            ]);
            $id = $info['requestid'];        
            try {
                $req = \App\Models\Request::where('Id', $id)->get()[0];  

            if($info['action'] == 'accept')
            {
                $request = \App\Models\Request::where('Id', $id)->update(['Accepted' => 1]);    

                Transaction::create([
                    
                    'MemberId' => $req['MemberId'],
                    'DocumentId' => $req['DocumentId'],
                    'TDate' => $req['RequestDate'],
                    'TDescription' => 'Accepted'
                ]);
            }
            elseif($info['action'] === 'reject')
            {
                #dd($id);
                Transaction::create([
                    
                    'MemberId' => $req['MemberId'],
                    'DocumentId' => $req['DocumentId'],
                    'TDate' => $req['RequestDate'],
                    'TDescription' => 'Rejected'
                ]);
                \App\Models\Request::where('Id', $id)->delete();
            }
        return redirect('/loanpage');

        } catch(PDOException $e) { dd($e); }
  
    }

    public function create_loan(Request $request)
    {
        //dd($request);
        
       
        $info = $request->validate([            
                'requestid' => 'required'
            ]);
            $id = $info['requestid'];     

            $req = \App\Models\Request::where('Id', $id)->get()[0];  
            try {
                Loan::create([
                    'MemberId' => $req['MemberId'],
                    'DocumentId' => $req['DocumentId'],
                    'RequestDate' => $req['RequestDate'],
                    'StartDate' => $req['StartDate'],
                    'EndDate' => $req['EndDate']
                ]);                
                Transaction::create([
                    
                    'MemberId' => $req['MemberId'],
                    'DocumentId' => $req['DocumentId'],
                    'TDate' => $req['RequestDate'],
                    'TDescription' => 'Loan made'
                ]);
                \App\Models\Request::where('Id', $id)->delete();
            
                return redirect('/loanpage');

        } catch(PDOException $e) { dd($e); }  
    }

    public function return_doc(Request $request)
    {
        $info = $request->validate([            
            'loanid' => 'required'
        ]);   
        try {
            $loan = Loan::where('Id', $info['loanid'])->get()[0];  
            $time = date("Y-m-d h:i:s", time());
            Loan::where('Id', $info['loanid'])->delete();

            Transaction::create([
                    
                'MemberId' => $loan['MemberId'],
                'DocumentId' => $loan['DocumentId'],
                'TDate' => $time,
                'TDescription' => 'Loan returned'
            ]);
            return redirect('/loanpage');
         } catch(PDOException $e) { dd($e); }
    }
}