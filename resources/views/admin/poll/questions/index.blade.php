@extends('admin.layouts.poll.app')
@section('style')
    <!--Regular Datatables CSS-->
    <link href="{{asset('css/dataTables.min.css')}}" rel="stylesheet">
    <style>
        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568; 			/*text-gray-700*/
            padding-left: 1rem; 		/*pl-4*/
            padding-right: 1rem; 		/*pl-4*/
            padding-top: .5rem; 		/*pl-2*/
            padding-bottom: .5rem; 		/*pl-2*/
            line-height: 1.25; 			/*leading-tight*/
            border-width: 2px; 			/*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7; 		/*border-gray-200*/
            background-color: #edf2f7; 	/*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;	/*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button		{
            font-weight: 700;				/*font-bold*/
            border-radius: .25rem;			/*rounded*/
            border: 1px solid transparent;	/*border border-transparent*/
        }
        
        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
            color: #fff !important;				/*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
            font-weight: 700;					/*font-bold*/
            border-radius: .25rem;				/*rounded*/
            background: #18BADD !important;		/*bg-indigo-500*/
            border: 1px solid transparent;		/*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
            color: #fff !important;				/*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
            font-weight: 700;					/*font-bold*/
            border-radius: .25rem;				/*rounded*/
            background: #18BADD !important;		/*bg-indigo-500*/
            border: 1px solid transparent;		/*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #18BADD !important; /*bg-indigo-500*/
        }
        .dataTables_wrapper thead .sorting:after{
            content:'' !important;
        }
        .dataTables_wrapper thead .sorting:before{
            content:'' !important;
            
        }
        .dataTables_wrapper thead .sorting_desc:after{
            content:'' !important;
        }
        .dataTables_wrapper thead .sorting_asc:after{
            content:'' !important;
            
        }
    </style>
@endsection
@section('content') 

<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('languages.poll_questions')}}</h3>
             <div class="card-options">
              <div class="input-group">
              <a class="btn btn-primary" href="{{ route('question.create',$id) }}"><i class="fe fe-plus mr-2"></i>{{__('languages.add')}}</a>
              </div>  
            </div>
        </div>
        <div class="card-body">
            <div id="app">
                <section class="p-3 px-0">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <a href="{{ route('poll.list') }}">{{__('languages.poll')}}</a>
                            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                        </li>
                        <li>
                            <a href="#" class="text-gray-500" aria-current="page">{{__('languages.questions')}}</a>
                        </li>
                    </ol>
                </section>
            
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                        <table v-if="questions.length > 0"  id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th data-priority="1">#</th>
                                    <th data-priority="2">{{__('languages.question')}}</th>
                                    <th data-priority="3">{{__('languages.options')}}</th>
                                    <th data-priority="4">{{__('languages.vistors_allowed')}}</th>
                                    <th data-priority="5">{{__('languages.votes')}}</th>
                                    <th data-priority="6">{{__('languages.state')}}</th>
                                    <th data-priority="7">{{__('languages.edit')}}</th>
                                    <th data-priority="8">{{__('languages.delete')}}</th>
                                    <th data-priority="8">{{__('languages.result')}}</th>
                                    <th data-priority="9">{{__('languages.lock_unlock')}}</th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr class="text-center" v-for="(question, index) in questions">
                                <th scope="row">@{{ question.id }}</th>
                                <td>@{{ question.question }}</td>
                                <td>@{{ question.options_count }}</td>
                                <td>@{{ question.canVisitorsVote ? "Yes" : "No" }}</td>
                                <td>@{{ question.votes_count }}</td>
                                <td>
                                    <span v-if="question.isLocked" class="label label-danger">{{__('languages.closed')}}</span>
                                    <span v-else-if="question.isComingSoon" class="label label-info">{{__('languages.soon')}}</span>
                                    <span v-else-if="question.isRunning" class="label label-success">{{__('languages.started')}}</span>
                                    <span v-else-if="question.hasEnded" class="label label-success">{{__('languages.ended')}}</span>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" :href="question.edit_link">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="#" @click.prevent="deleteQuestion(index)">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                <a class="btn btn-primary btn-sm" href="#" @click.prevent="resultQuestion(index)">
                                    
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="#" @click.prevent="toggleLock(index)">
                                        <i v-if="question.isLocked" class="fa fa-lock" aria-hidden="true"></i>
                                        <i v-else class="fa fa-unlock" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <small v-else>{{__('languages.no_question')}} <a href="{{ route('question.create',$id) }}">&nbsp; {{__('languages.now')}}</a></small>
                </div> 
            </div>  

        </div>
    </div>
    </div>
</div>



       
<!-- Modal -->
<div class="modal fade" id="resultModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('languages.result')}}</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('languages.close')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')

<script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/axios.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/datatable.min.js')}}"></script>
<script src="{{asset('js/datatable.responsive.min.js')}}"></script>
   
    <script>
       new Vue({
           el: "#app",
           data(){
               return {
                   questions: {!! json_encode($questions) !!},
               }
           },
           mounted(){
               $('#example').DataTable( {
                language: {
                    "url": "/datatable_languages/{{str_replace('_', '-', app()->getLocale())}}/datatable.json"
                },
                   responsive: true
               } ) .columns.adjust().responsive.recalc();
           },
           methods:{
               deleteQuestion(index){
                var link = this.questions[index].delete_link;
                var thisquestion = this.questions;

                swal({
                        title: "{{__('languages.want_to_delete_question')}}", 
                        icon: "warning",
                        buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                        ],
                        dangerMode: true,
                        }).then(function(isConfirm) {
                        if (isConfirm) {
                            axios.delete(link)
                                .then((response) => {
                                    thisquestion.splice(index, 1);
                                });
                            swal({
                                title: "{{__('languages.deleted')}}",
                                text: "{{__('languages.deleted_success')}}",
                                icon: 'success'
                            });

                        } else {
                            swal("{{__('languages.cancelled')}}", "{{__('languages.data_is_safe')}}", "error");
                        }
                });

               },
               resultQuestion(index){
                var link = this.questions[index].result_link; 
                    axios.get(link)
                    .then((response) => {  
                        $('.modal-body').html('');
                        $('#resultModal').modal('toggle');
                        $('.modal-body').append(response.data);
                    })
                    .catch((error) => {
                    })

               },
               toggleLock(index){
                   if(this.questions[index].isLocked){
                       this.unlock(index);
                       return;
                   }
                   this.lock(index)
               },
               lock(index){
                var locklink =this.questions[index].lock_link;
                var asign = this.assignNewData;
                swal({
                    title: "{{__('languages.want_to_lock')}}",
                        icon: "warning",
                        buttons: [
                            "{{__('languages.no_cancel_it')}}",
                            "{{__('languages.yes_i_am_sure')}}"
                        ],
                        dangerMode: true,
                        }).then(function(isConfirm) {
                        if (isConfirm) {
                            axios.patch(locklink)
                            .then((response) => {
                                asign(response,index)
                            });
                            swal({
                                title: "{{__('languages.question_unlocked')}}",                                
                                icon: 'success'
                            });

                        } else {
                            swal("{{__('languages.cancelled')}}", "{{__('languages.data_is_safe')}}", "error");
                        }
                });
                  
               },
               unlock(index){
                var unlocklink =this.questions[index].unlock_link;
                var asign = this.assignNewData;

                swal({
                        title: "{{__('languages.want_to_unlock')}}", 
                        icon: "warning",
                        buttons: [
                            "{{__('languages.no_cancel_it')}}",
                            "{{__('languages.yes_i_am_sure')}}"
                        ],
                        dangerMode: true,
                        }).then(function(isConfirm) {
                        if (isConfirm) {
                            axios.patch(unlocklink)
                           .then((response) => {
                            asign(response,index)
                           });
                            swal({
                                title: "{{__('languages.question_unlocked')}}",
                                icon: 'success'
                            });

                        } else {
                            swal("{{__('languages.cancelled')}}", "{{__('languages.data_is_safe')}}", "error");
 
                        }
                });
               },
               assignNewData(response,index){
                   this.questions[index].isLocked = response.data.question.isLocked;
                   this.questions[index].isRunning = response.data.question.isRunning;
                   this.questions[index].isComingSoon = response.data.question.isComingSoon;
               }
           }
       })
    </script>
@endsection
