function removeTag(tag, blog){
    let slug = blog.slug;
    $.ajax({
        url: `/dashboard/manage-blogs/details/tags/delete?slug=${slug}&tagSlug=${tag.slug}`,
        type:"delete",
        data: [],
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function (response){
            if(response.code === "TAG_DELETED"){
                $('#success_new_account').fadeIn()
                $('.modal').modal('hide');
                $('#success_new_account').modal('show');


            }
            location.reload()
        },
        error:function (error){
            $('#error').fadeIn()
            $('.modal').modal('hide');
            $('#error').modal('show');
        }
    })
}
