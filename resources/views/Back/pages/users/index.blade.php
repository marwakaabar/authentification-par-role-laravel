@extends('Back.admin')
@section('content') 
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Liste des Users</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- Optionally add header content here -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role ? $user->role->nom : 'Aucun rôle' }}</td> <!-- Afficher le nom du rôle ou 'Aucun rôle' -->
                                        <td>
                                            <div style="display: flex; align-items: center;">
                                               
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger" title="Supprimer">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include your JS files here -->
<script src="../js/core/jquery-3.7.1.min.js"></script>
<script src="../js/core/popper.min.js"></script>
<script src="../js/core/bootstrap.min.js"></script>
<script src="../js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../js/plugin/datatables/datatables.min.js"></script>
<script src="../js/kaiadmin.min.js"></script>
<script src="../js/setting-demo2.js"></script>
<script>
    $(document).ready(function () {
        $("#add-row").DataTable({
            pageLength: 5,
        });
    });

    function setEditUserData(id, name, email, roleName) {
        // Mettre à jour l'action du formulaire
        document.getElementById('editRoleForm').action = '/user/' + id; // Assurez-vous que c'est la bonne URL

        // Remplir les champs du modal
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        // Si vous avez un champ pour le rôle, vous pouvez également le remplir ici
    }
</script>
@endsection
