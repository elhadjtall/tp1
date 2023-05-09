const validation = new JustValidate("#inscrire");


validation
    .addField("#nom", [
        {
            rule: "required"
        }
    ]);