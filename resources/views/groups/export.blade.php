{{-- resources/views/exports/students.blade.php --}}
<table style="direction: rtl;">

    {{-- ═══════════════════════════════
         Header الجامعة
    ═══════════════════════════════ --}}
    <tr>
        <td colspan="4" style="
            background-color: #003087;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 14px;
            letter-spacing: 1px;
        ">
            جامعة عين شمس — كلية التربية النوعية
        </td>
    </tr>

    <tr>
        <td colspan="4" style="background-color:#e8eef7; padding: 14px; text-align: center; letter-spacing: 1px; font-size: 16px; color: #555;">
            مادة {{ $subjectName }} - {{ $location }}
        </td>
    </tr>

    {{-- ═══════════════════════════════
        رأس الجدول
    ═══════════════════════════════ --}}
    <thead>
        <tr>
            <th style="
                background-color: #001f5b;
                color: #ffffff;
                font-size: 13px;
                font-weight: bold;
                text-align: center;
                padding: 10px 14px;
                border: 1px solid #003087;
                width: 50px;
            ">م</th>

            <th style="
                background-color: #001f5b;
                color: #ffffff;
                font-size: 13px;
                font-weight: bold;
                text-align: center;
                padding: 10px 14px;
                border: 1px solid #003087;
            ">اسم الطالب</th>

            <th style="
                background-color: #001f5b;
                color: #ffffff;
                font-size: 13px;
                font-weight: bold;
                text-align: center;
                padding: 10px 14px;
                border: 1px solid #003087;
            ">المجموعة</th>

            <th style="
                background-color: #001f5b;
                color: #ffffff;
                font-size: 13px;
                font-weight: bold;
                text-align: center;
                padding: 10px 14px;
                border: 1px solid #003087;
            ">ميعاد الدخول</th>
        </tr>
    </thead>

    {{-- ═══════════════════════════════
         البيانات
    ═══════════════════════════════ --}}
    <tbody>
        @foreach($groups as $group)

            {{-- ── صف معلومات المجموعة ── --}}
            <tr>
                {{-- اسم المجموعة والميعاد --}}
                <td colspan="3" style="
                    background-color: #ccd9f0;
                    color: #001f5b;
                    font-size: 13px;
                    font-weight: bold;
                    text-align: right;
                    padding: 10px 14px;
                    border: 1px solid #99b3de;
                    text-align: center;
                ">
                    {{ $group->name }}
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    ميعاد الدخول: {{ $group->time }}
                </td>

                {{-- عدد الطلاب في المجموعة فقط هنا --}}
                <td style="
                    background-color: #003087;
                    color: #ffffff;
                    font-size: 13px;
                    font-weight: bold;
                    text-align: center;
                    padding: 10px 14px;
                    border: 1px solid #001f5b;
                ">
                    {{ $group->number_of_students }} طالب
                </td>
            </tr>

            {{-- ── طلاب المجموعة ── --}}
            @php $counter = 1; @endphp
            @foreach($students->where('group_id', $group->id) as $student)
                <tr>

                    {{-- م --}}
                    <td style="
                        text-align: center;
                        padding: 7px 12px;
                        border: 1px solid #c5d3e8;
                        color: #003087;
                        font-weight: bold;
                        font-size: 12px;
                        width: 50px;
                        background-color: {{ $counter % 2 === 0 ? '#b3ccf3' : '#ffffff' }};
                    ">{{ $counter }}</td>

                    {{-- اسم الطالب --}}
                    <td style="
                        text-align: right;
                        padding: 7px 14px;
                        border: 1px solid #c5d3e8;
                        color: {{ $counter % 2 === 0 ? '#003087' : '#444' }};
                        font-size: 12px;
                        font-weight: bold;
                        background-color: {{ $counter % 2 === 0 ? '#b3ccf3' : '#ffffff' }};
                    ">{{ $student->name }}</td>

                    {{-- المجموعة --}}
                    <td style="
                        text-align: center;
                        padding: 7px 12px;
                        border: 1px solid #c5d3e8;
                        color: {{ $counter % 2 === 0 ? '#003087' : '#444' }};
                        font-size: 12px;
                        font-weight: bold;
                        background-color: {{ $counter % 2 === 0 ? '#b3ccf3' : '#ffffff' }};
                    ">{{ $group->name }}</td>

                    {{-- ميعاد الدخول --}}
                    <td style="
                        text-align: center;
                        padding: 7px 12px;
                        border: 1px solid #c5d3e8;
                        color: {{ $counter % 2 === 0 ? '#003087' : '#444' }};
                        font-size: 12px;
                        font-weight: bold;
                        background-color: {{ $counter % 2 === 0 ? '#b3ccf3' : '#ffffff' }};
                    ">{{ $group->time }}</td>

                    {{ $counter++ }}

                </tr>
            @endforeach

            {{-- ── فاصل بين المجموعات ── --}}
            <tr>
                <td colspan="4" style="
                    background-color: #003087;
                    height: 3px;
                    padding: 0;
                "></td>
            </tr>

        @endforeach
    </tbody>

    {{-- ═══════════════════════════════
         Footer
    ═══════════════════════════════ --}}
    <tr>
        <td colspan="4" style="
            background-color: #f0f4fb;
            color: #888;
            font-size: 11px;
            text-align: center;
            padding: 8px;
            border-top: 2px solid #003087;
        ">
            تم إنشاء هذا الملف تلقائياً — جامعة عين شمس {{ now()->format('Y') }}
        </td>
    </tr>

</table>