
<div class="modal fade" id="points" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="pointsTitle">My Points</h5>
                    <button type="button" id="close_points" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-9" style="font-size: 30px">Balance: {{ Auth::user()->wallet->balance }}
                            points</div>
                        <div class="col-3"></div>

                    </div>
                    <div class="row mt-50  mb-2">
                        <div class="col-4"></div>
                        <div class="col-5" style="font-size: 20px">Get Any Points</div>
                        <div class="col-3"></div>
                    </div>
                    <div>
                        <li class="row mb-4">
                            <div class="col-8" style="font-size: 20px">10 points / 10 F cfa</div>
                            <a class="col-4"  href="{{ route('payment', 10) }}"><button class="btn btn-secondary">Suscribe</button></a>

                        </li>
                        <li class="row mb-4">
                            <div class="col-8" style="font-size: 20px">30 points / 25 F cfa</div>
                            <a  class="col-4" href="{{ route('payment', 25) }}"><button class="btn btn-secondary">Suscribe</button></a>

                        </li>
                        <li class="row mb-4">
                            <div class="col-8" style="font-size: 20px">50 points / 75 F cfa</div>
                            <a  class="col-4" href="{{ route('payment', 75) }}"><button class="btn btn-secondary">Suscribe</button></a>

                        </li>
                        <li class="row mb-4">
                            <div class="col-8" style="font-size: 20px">100 points / 100 F cfa</div>
                            <a  class="col-4" href="{{ route('payment', 100) }}"><button class=" btn btn-secondary">Suscribe</button></a>

                        </li>
                    </div>
                </div>
                <div class="modal-footer">
                    to get seller's phone you need points
                </div>
            </div>
        </div>
    </div>