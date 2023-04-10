import { ref, Ref } from "vue";
import { pageRange } from "./types";
export class Pagination<T>{
    public data = ref<T[]>() as Ref<T[]>;
    public currentPageArray = ref<T[]>() as Ref<T[]>;
    public amountPerPage = ref<number>(2);
    public currentPageNumber = ref<number>(1);
    public numberOfPages: number = 0;
    public range = ref<pageRange>({start: 0, end: 0});
    constructor(data: T[], amountPerPage: number){
        this.data.value = data;
        this.amountPerPage.value = amountPerPage;
        this.numberOfPages = Math.ceil(this.data.value.length / this.amountPerPage.value);
        this.range.value = {start: 0, end: this.amountPerPage.value};
        this.currentPageArray.value = this.data.value.slice(this.range.value.start, this.range.value.end);
    }
    public nextPage(){
        if(this.currentPageNumber.value < this.numberOfPages){
            this.currentPageNumber.value++;
            this.range.value.start += this.amountPerPage.value;
            this.range.value.end += this.amountPerPage.value;
            this.currentPageArray.value = this.data.value.slice(this.range.value.start, this.range.value.end);
        }
    }
    public previousPage(){
        if(this.currentPageNumber.value > 1){
            this.currentPageNumber.value--;
            this.range.value.start -= this.amountPerPage.value;
            this.range.value.end -= this.amountPerPage.value;
            this.currentPageArray.value = this.data.value.slice(this.range.value.start, this.range.value.end);
        }  
    }
    public goToPage(pageNumber: number){
        if(pageNumber > 0 && pageNumber <= this.numberOfPages){
            this.currentPageNumber.value = pageNumber;
            this.range.value.start = (pageNumber - 1) * this.amountPerPage.value;
            this.range.value.end = pageNumber * this.amountPerPage.value;
            this.currentPageArray.value = this.data.value.slice(this.range.value.start, this.range.value.end);
        }
    }

    public changeAmountPerPage(amount: number){
        this.amountPerPage.value = amount;
        this.numberOfPages = Math.ceil(this.data.value.length / this.amountPerPage.value);
        this.range.value = {start: 0, end: this.amountPerPage.value};
        this.currentPageArray.value = this.data.value.slice(this.range.value.start, this.range.value.end);
    }

    public updateNumberOfPages(){
        this.numberOfPages = Math.ceil(this.data.value.length / this.amountPerPage.value);
    }
        
    // constructor(data : T){
    //     this.data = data;
    // }

}