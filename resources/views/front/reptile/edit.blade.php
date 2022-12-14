<x-app-layout>

    <x-slot name="header">
        {{ __('Reptile Modify') }}
    </x-slot>


    <x-jet-validation-errors class="mb-4"/>


    <div class="px-4 mt-8 mb-4">
        <div class="p-4 bg-white shadow m-auto max-w-[1280px]">
            <form method="POST" action="{{route('reptile.update', $reptile)}}" id="reptile-create-form">
                @method('patch')
                @csrf

                @include('parts.input', [
                      'title'=>'개체 이름',
                      'name'=>'name',
                      'type'=>'text',
                      'value'=>$reptile['name']
                  ])

                <livewire:reptile-search-list
                    :typeList="$typeList"
                    :fatherReptileList="$fatherReptileList"
                    :matherReptileList="$matherReptileList"
                    :typeSelected="$reptile['type_id']"
                    :fatherSelected="$reptile['father_id']"
                    :matherSelected="$reptile['mather_id']"
                    :isDefault="true"
                />

                @include('parts.checkbox', [
                    'title'=>"성별 선택",
                    'list' => ['u' => '미구분', 'm' => '수', 'f' => '암'],
                    'type' => 'radio',
                    'name' => 'gender',
                    'changeListener' =>  'typeChange',
                    'selectedKey' => $genderKey
                ])

                @include('parts.input', [
                         'title'=>'개체 모프',
                         'name'=>'morph',
                         'type'=>'text',
                         'placeholder'=> "ex:트익할,릴리",
                         'value'=>$reptile['morph'],
                         ])

                @include('parts.input', [
                         'title'=>'개체 생일',
                         'name'=>'birth',
                         'type'=>'date',
                         'value' => $reptile['birth'],
                         ])

                @include('parts.textarea', [
                        'value' => $reptile['comment']
                        ])

                @include('parts.button-submit', [
                    "formId" => "reptile-create-form"
                ])
                @include('parts.button-cancel', [
                    'route' => route('reptile.show', $reptile)
                ])
            </form>
        </div>
    </div>

    </x-guest-layout>