<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>New Desigin</h2>
                        <div class="ml-auto">
                            <a href="" class="btn btn-outline-secondary">Back to all Decisions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form @submit.prevent="editing = true" method="post">
                        <div class="form-group">
                            <label for="decision-number">Decision Number</label>
                            <input type="number" min="0" max="4294967295" name="decision_number" id="decision-number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="judgement-number">Judgement Number</label>
                            <input type="number" min="0" max="4294967295" name="judgement_number" id="judgement-number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="decision-date">Decision Date</label>
                            <input type="date" min="0" max="4294967295" name="decision_date" id="decision-date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="issuing-authority">Issuing Authority</label>
                            <select name="issuing_authority" id="issuing-authority" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Create Decision</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>