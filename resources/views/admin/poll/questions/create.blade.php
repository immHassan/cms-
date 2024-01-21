@extends('admin.layouts.poll.app')
@section('style')
    <link href="{{asset('css/datetimepicker.css')}}" rel="stylesheet" />
    <style>
        .custom-label input:checked + svg {
            display: block !important;
        }

        .modal {
            transition: opacity 0.25s ease;
        }
        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
@endsection
@section('content')

<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('languages.add_poll_question')}}</h3>
        </div>
        <div class="card-body">
            <div id="app">
                <section class="p-3 px-0">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <a href="{{ route('poll.list') }}">{{__('languages.poll')}}</a>
                            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                        </li>
                        <li class="flex items-center">
                            <a href="{{route('question.index',$id)}}">{{__('languages.questions')}}</a>
                            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                        </li>
                        <li>
                            <a href="#" class="text-gray-500" aria-current="page">{{__('languages.create')}}</a>
                        </li>
                    </ol>
                </section>
                <div class="w-full">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" autocomplete="off" >

                        <div class="mb-6">
                            <label class="block text-gray-700 text-lg font-bold mb-2 uppercase tracking-wide font-bold" for="question">
                            {{__('languages.question')}}
                            </label>
                            <input v-model="question" placeholder="{{__('languages.winner')}}" class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label class="block text-gray-700 text-lg font-bold mb-2 uppercase tracking-wide font-bold" for="options">
                            {{__('languages.options')}}
                            </label>
                            <div v-for="(option, index) in options" class="w-full flex items-center border-b border-b-2 border-teal-500 py-2">
                                <input v-model="option.value" :placeholder="option.placeholder" class="appearance-none bg-transparent border-none block w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" />
                                <button @click.prevent="remove(index)" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                                {{__('languages.remove')}}
                                </button>
                            </div>
                            <div class="w-full flex items-center border-b border-b-2 border-teal-500 py-2">
                                <input @keyup.enter="addNewOption" v-model="newOption" class="appearance-none bg-transparent border-none block w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="{{__('languages.option')}}" aria-label="Full name">
                                <button @click.prevent="addNewOption" class="btn btn-info rounded" type="button">
                                {{__('languages.add')}}
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                {{__('languages.start_at')}}
                                    
                                </label>
                                <input id="starts_at" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white localDates" type="text">
                                <p class="text-red-500 text-xs italic hidden">Please fill out this field.</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                {{__('languages.end_at')}}
                                    
                                </label>
                                <input id="ends_at" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 localDates" type="text">
                            </div>
                        </div>
                                <input id="poll_id" style="display:none" value="{{$id}}" type="text">

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="custom-label flex">
                                    <div class="bg-white shadow w-6 h-6 p-1 flex justify-center items-center mr-2">
                                        <input id="canVisitors" type="checkbox" class="hidden">
                                        <svg class="hidden w-4 h-4 text-green-600 pointer-events-none" viewBox="0 0 172 172"><g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/></g></svg>
                                    </div>
                                    <span class="select-none">{{__('languages.allow_guest_to_vote')}}</span>
                                </label>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 option-check">
                                <label class="custom-label flex">
                                    <div class="bg-white shadow w-6 h-6 p-1 flex justify-center items-center mr-2">
                                        <input id="canVoterSeeResult" type="checkbox" class="hidden">
                                        <svg class="hidden w-4 h-4 text-green-600 pointer-events-none" viewBox="0 0 172 172"><g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/></g></svg>
                                    </div>
                                    <span class="select-none">{{__('languages.can_voter_see_result')}}</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <button @click.prevent="save" class="btn btn-info" type="button">
                                {{__('languages.create')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>  
</div>
@endsection

@section('js')
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.js')}}"></script>
    <script src="{{asset('js/datetimepicker.js')}}"></script>
    <script src="{{asset('js/vuetoasted.js')}}"></script> 
    <script>
        Vue.use(Toasted)
        new Vue({
           el: '#app',
            computed:{
              filledOptions(){
                return this.options.map((option) => {
                    return option.value;
                } ).filter((option) => option);
              }
            },
            mounted(){
                $('.localDates').datetimepicker({
                    format: 'y-m-d H:m',
                });
            },
            data(){
               return {
                    newOption: '',
                    question: '',
                    options: [
                        { value: '', placeholder: "{{__('languages.option')}} 1"},
                        { value: '', placeholder: "{{__('languages.option')}} 2"},
                    ],
                   error_message: '',
               }
            },
            methods:{
               addNewOption(){
                   if(this.newOption.length === 0){
                       this.error_message = "{{__('languages.fill_option')}}";
                       this.flushModal();
                       return;
                   }
                   if(this.filledOptions.filter( option => option === this.newOption).length !== 0){
                       this.error_message = "{{__('languages.not_same')}}";
                       this.flushModal();
                       return;
                   }

                   this.options.push({
                       value: this.newOption,
                       placeholder: ''
                   });
                   this.newOption = '';
               },
                remove(index){
                    if(this.filledOptions.length <= 2){
                        this.error_message = "{{__('languages.two_options')}}";
                        this.flushModal();
                        return;
                    }
                    this.options = this.options.map((option, localIndex) => {
                        if(localIndex === index){
                            return null;
                        }

                        return option
                    }).filter(option => option);
                },
                save(){
                    if(this.question.length === 0){
                        this.error_message = "{{__('languages.fill_question')}}";
                        this.flushModal();
                        return;
                    }

                    if(this.filledOptions.length < 2){
                        this.error_message = "{{__('languages.two_options')}}";
                        this.flushModal();
                        return;
                    }

                   let data = {
                       question: this.question,
                       options: this.filledOptions,
                       starts_at: document.getElementById('starts_at').value,
                       poll_id: document.getElementById('poll_id').value,
                       canVisitorsVote: document.getElementById('canVisitors').checked,
                       canVoterSeeResult: document.getElementById('canVoterSeeResult').checked

                   };

                   if(document.getElementById('ends_at').value !== ''){
                       data.ends_at = document.getElementById('ends_at').value;
                   }

                   // POST TO STORE
                   axios.post("{{ route('question.store') }}", data)
                   .then((response) => {
                       Vue.toasted.success(response.data).goAway(1500);
                       setTimeout(() => {
                           window.location.replace("{{ route('question.index',$id) }}");
                       }, 1500)
                   })
                   .catch((error) => {

                       Object.values(error.response.data.errors)
                       .forEach((error) => {
                           this.flushModal(error[0], 2000);
                       })
                   })
                },
                flushModal(message = this.error_message, after = 1500){
                    Vue.toasted.error(message).goAway(after);
                }
            }
        });
    </script>
@endsection
