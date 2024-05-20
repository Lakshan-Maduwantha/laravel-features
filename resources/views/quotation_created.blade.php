@component('mail::message')
    # New Quotation Created

    Hello {{ $user->name }},

    You have received a new quotation for the prescription ID: {{ $prescription->id }}.

    Quotation Amount: ${{ $quotation->quotation_amount }}
    Terms: {{ $quotation->terms ?? 'N/A' }}

    Regards,
    {{ config('lakshanmw') }}
@endcomponent
