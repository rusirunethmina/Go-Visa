<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Book Appointment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="calendar-container"></div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="fw-bold text-muted">Available Time Slots</h6>
                        <hr>
                        <div id="loadTimeSlot" class="text-center" style="display: none">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <div id="divTimeSlot">
                        </div>

                        <div class="alert alert-secondary p-4" style="border: 2px solid;">
                            <form id="bookingForm" method="post" action="{{route('confirm-booking')}}">
                                @csrf
                                <input name="agent_id" id="txtAgentId" type="hidden">
                                <input name="date" id="txtDate" type="hidden">
                                <input name="time_slot_id" id="txtTime" type="hidden">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Date</label>
                                        <input readonly class="form-control fw-bold" id="txtDateView">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Time</label>
                                        <input readonly class="form-control fw-bold" id="txtTimeView">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-end">
                                        <button id="btnConfirm" type="submit" class="btn btn-primary">Confirm Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
