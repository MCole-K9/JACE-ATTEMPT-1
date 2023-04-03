import { ref } from "vue";
import { pageRange } from "./types";
export class Pagination<T>{
    public data : T[] = [] as T[];
    public currentPageArray : T[] = [] as T[];
    public amountPerPage = ref<number>(2);
    public currentPageNumber = ref<number>(1);
    public numberOfPages: number = Math.ceil(this.data.length / 2);
    public range = ref<pageRange>({start: 0, end: 0});
    constructor(data: T[], amountPerPage: number){
        this.data = data;
        this.amountPerPage.value = amountPerPage;
        this.numberOfPages = Math.ceil(this.data.length / this.amountPerPage.value);
        this.range.value = {start: 0, end: this.amountPerPage.value};
        this.currentPageArray = this.data.slice(this.range.value.start, this.range.value.end);
    }
    public nextPage(){
        if(this.currentPageNumber.value < this.numberOfPages){
            this.currentPageNumber.value++;
            this.range.value.start += this.amountPerPage.value;
            this.range.value.end += this.amountPerPage.value;
            this.currentPageArray = this.data.slice(this.range.value.start, this.range.value.end);
        }
    }
    public previousPage(){
        if(this.currentPageNumber.value > 1){
            this.currentPageNumber.value--;
            this.range.value.start -= this.amountPerPage.value;
            this.range.value.end -= this.amountPerPage.value;
            this.currentPageArray = this.data.slice(this.range.value.start, this.range.value.end);
        }  
    }
    public goToPage(pageNumber: number){
        if(pageNumber > 0 && pageNumber <= this.numberOfPages){
            this.currentPageNumber.value = pageNumber;
            this.range.value.start = (pageNumber - 1) * this.amountPerPage.value;
            this.range.value.end = pageNumber * this.amountPerPage.value;
            this.currentPageArray = this.data.slice(this.range.value.start, this.range.value.end);
        }
    }
        
    // constructor(data : T){
    //     this.data = data;
    // }

}