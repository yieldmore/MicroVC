function ValidateContact(frm)
{
  if (FieldInvalid(frm.name, frm.Name.value.length <1, "Please input your Name!")) return false;
  if (FieldInvalid(frm.email, frm.email.value.length <1, "Please input your Email!")) return false;
  emlinv = frm.email.value.indexOf('@', 0) == -1 || frm.email.value.indexOf('.', 0) == -1;
  if (FieldInvalid(frm.email, emlinv, "The Email format is wrong!")) return false;
  if (FieldInvalid(frm.phone, frm.phone.value.length <1, "Please input your Phone Number!")) return false;
  if (FieldInvalid(frm.howdid, frm.howdid.value.length <1, "Please mention how you heard about us!")) return false;
  if (FieldInvalid(frm.message, frm.message.value.length <1, "Please enter a message!")) return false;
}

function FieldInvalid(what, when, msg)
{
  if (when)
  {
    alert(msg);
    what.focus();
    return true;
  }
  return false;
}
