<div>
    <h1>my table</h1>
    <select wire:model="doctype" name="search">
        <option value="doc">Document</option>
        <option value="mem">Members</option>
    </select>
    @if ($doctype === 'doc')
    <select wire:model="docsearch" name="search">
        <option value="">Filter</option>
        <option value="req">Requests</option>
        <option value="loan">Loans</option>
        <option value="late">Late</option>
    </select>
        @if ($docsearch == '')        
        <table>
            <tr>
                <th>Id</th>
                <th>DocInfo</th>
                <th>Category</th>
                <th>Type</th>
                <th>Genre</th>
            </tr>
            @foreach ($docs as $detail)
                <tr>
                    <td>{{$detail['Id']}}</td>
                    <td>{{$detail['DocInfo']}}</td>
                    <td>{{$detail['Category']}}</td>
                    <td>{{$detail['Type']}}</td>
                    <td>{{$detail['Genre']}}</td>
                </tr>
            @endforeach 
        </table>
        @endif
        @if ($docsearch === 'req')
            <h1>Requested Documents</h1>
            <table>
                <tr>
                    <th>Id</th>
                    <th>MemberId</th>
                    <th>DocumentId</th>
                    <th>Request Date</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                @foreach ($requests as $detail)
                    <tr>
                        <td>{{$detail['Id']}}</td>
                        <td>{{$detail['MemberId']}}</td>
                        <td>{{$detail['DocumentId']}}</td>
                        <td>{{$detail['RequestDate']}}</td>
                        <td>{{$detail['StartDate']}}</td>
                        <td>{{$detail['EndDate']}}</td>
                    </tr>
                @endforeach 
        @endif
        @if ($docsearch === 'loan')
            <h1>Current Loans</h1>
            <table>
                <tr>
                    <th>Id</th>
                    <th>MemberId</th>
                    <th>DocumentId</th>
                    <th>RequestId</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                @foreach ($loans as $detail)
                    <tr>
                        <td>{{$detail['Id']}}</td>
                        <td>{{$detail['MemberId']}}</td>
                        <td>{{$detail['DocumentId']}}</td>
                        <td>{{$detail['RequestId']}}</td>
                        <td>{{$detail['StartDate']}}</td>
                        <td>{{$detail['EndDate']}}</td>
                    </tr>
                @endforeach 
        @endif
        @if ($docsearch === 'late')
            <h1>Currently Late</h1>
        @endif


    @elseif ($doctype === 'mem')
        <input wire:model="memsearch" type="text" placeholder="Search">
        @if($memsearch == '')
        <table>
            <tr>
                <th>Id</th>
                <th>DocInfo</th>
                <th>Category</th>
                <th>Type</th>
                <th>Genre</th>
                <th>Requests</th>
                <th>Loans</th>
            </tr>
            @foreach ($docs as $detail)
                <tr>
                    <td>{{$detail['Id']}}</td>
                    <td>{{$detail['DocInfo']}}</td>
                    <td>{{$detail['Category']}}</td>
                    <td>{{$detail['Type']}}</td>
                    <td>{{$detail['Genre']}}</td>
                </tr>
            @endforeach 

        </table>
        @endif
        @if ($memsearch != '')
        <h1>Member Info</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
            </tr>
            @foreach ($members as $detail)
                <tr>
                    <td>{{$detail['Id']}}</td>
                    <td>{{$detail['FName']}} {{$detail['LName']}}</td>
                    <td>{{$detail['ContactInfo']}}</td>
                    <td>{{$detail['Address']}}</td>
                </tr>
            @endforeach 

        </table>
        @endif
        @else
            <p>Nothing to show</p>

        @endif    
    {{-- The Master doesn't talk, he acts. --}}
</div>
