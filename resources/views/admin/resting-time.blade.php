<div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Tiempo restante de alquileres</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div id="table_data" class="card-body table-responsive p-0">
                        <table class="table table-valign-middle">
                            <thead class="thead">
                                <tr>
                                    <th>Socio</th>
                                    <th>Pelicula</th>
                                    <th class="text-center">Dias faltantes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rest_time as $row)
                                    <tr>
                                        <td>{{ $row->soc_nombre }}</td>
                                        <td>{{ $row->pel_nombre }}</td>
                                        <td class="text-center">
                                            @if ($row->Days <= 0)
                                                <span class="badge badge-danger"><i class="fas fa-skull"></i>{{ $row->Days }} </span>
                                            @elseif ($row->Days > 0 && $row->Days < 5)
                                                <span class="badge badge-warning">{{ $row->Days }} días <i class="ion ion-android-warning"></i></span>
                                            @elseif ($row->Days>5 && $row->Days<30)
                                                <span class="badge badge-success"> {{ $row->Days }} días <i class="ion ion-checkmark-circled"></i></span>
                                            @endif
                                        </td>
                                    <tr>                                              
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$rest_time->links()}}
                        <!--<p class="text-light text-center mt-3"><b>Alquileres Cercanos a la entrega</b></p>-->
                    </div>
                </div>
            </div>
</div>