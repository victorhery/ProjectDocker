                <div class="mb-3">
                    <label for="matieres" class="form-label">IM: Nom et Prenon :</label>
                    <select name="Cycle" id="">
                    @foreach($eleves as $eleves)
                    <option value="{{ $eleves->id }}">{{ $eleves->IM }} {{ $eleves->Nom_elev }} {{ $eleves->Prenom_eleve }}</option>
                    @endforeach      
                    </select>
                </div>