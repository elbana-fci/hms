@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center dec-stamp">
        <div class="col-md-12"><p class="title">محافظة الفيوم <br/>مديرية الشئون الصحية <br/>مستشفى طامية المركزي</p></div>
        <h3>قرار رقم [{{ $decision->decision_number}}] لسنة ٢٠٢١</h3>
        <div class="col-md-12"><p class="title">مدير عام المستشفى بعد الاطلاع على قانون الخدمة المدنية رقم 81 لسنة 2016 وعلى القضية المحلية رقم  [{{ $decision->judgement_number }}] والتي انتهت إلى قيد الواقعة مخالفة إدارية <br/>ضد كلأ من</p></div>

        <table class="table table-bordered table-dir">
            <thead>
                <tr>
                    <th scope="col">{{ __('emp.name') }}</th>
                    <th scope="col">{{ __('emp.title') }}</th>
                    <th scope="col">{{ __('emp.degree') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->title }}</td>
                        <td>{{ $employee->degree }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12"><p class="title">وذلك لأنهم بوصفهم و دائرة عملهم قد خرجوا على مقتضى الواجب الوظيفي على النحو التالي</p></div>
        <div class="col-md-12 title">{!! $decision->decision_content !!}</div>
        <div class="col-md-12"><p class="title">تحريرأ في</p></div>
    </div>
    <div class="row justify-content-center dec-signs">
            <div class="col-md-3 text-center">مسئول الجزاءات</div>
            <div class="col-md-3 text-center">مدير شئون العاملين</div>
            <div class="col-md-3 text-center">مدير عام المستشفى</div>
    </div>
</div>
@endsection